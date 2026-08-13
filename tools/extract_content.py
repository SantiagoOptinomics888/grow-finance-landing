"""Extrae contenido semántico limpio del HTML de WordPress (Gutenberg y Elementor).

Devuelve solo etiquetas de contenido —h2, h3, p, ul, ol, li, figure, img, a,
strong, em— descartando la maraña de divs y clases que genera Elementor.
"""
import json
import os
import re

from bs4 import BeautifulSoup, NavigableString

# Etiquetas en línea que se conservan dentro de un bloque de texto.
INLINE_KEEP = {"strong", "b", "em", "i", "a", "br"}
# Bloques que se emiten tal cual.
BLOCK_TAGS = {"h2", "h3", "h4", "p", "ul", "ol", "blockquote"}


def load_image_map(path="backup/image-map.json"):
    """Mapa de URL original de WordPress -> ruta local de la imagen."""
    if not os.path.exists(path):
        return {}
    with open(path, encoding="utf-8") as fh:
        return json.load(fh)


def clean_inline(node, image_map):
    """Serializa un nodo conservando solo el formato en línea permitido."""
    parts = []
    for child in node.children:
        if isinstance(child, NavigableString):
            parts.append(str(child))
            continue
        name = child.name
        if name == "br":
            parts.append("<br/>")
        elif name in INLINE_KEEP:
            inner = clean_inline(child, image_map).strip()
            if not inner:
                continue
            if name in ("b", "strong"):
                parts.append(f"<strong>{inner}</strong>")
            elif name in ("i", "em"):
                parts.append(f"<em>{inner}</em>")
            elif name == "a":
                href = normalize_link(child.get("href", ""))
                if href:
                    parts.append(f'<a href="{href}">{inner}</a>')
                else:
                    parts.append(inner)
        else:
            parts.append(clean_inline(child, image_map))
    text = "".join(parts)
    text = re.sub(r"\s+", " ", text)
    # Elementor suele anidar el mismo énfasis dos veces; se colapsa.
    for tag in ("strong", "em"):
        text = re.sub(rf"<{tag}>\s*<{tag}>", f"<{tag}>", text)
        text = re.sub(rf"</{tag}>\s*</{tag}>", f"</{tag}>", text)
    return text


def normalize_link(href):
    """Convierte enlaces internos del sitio viejo a rutas del sitio nuevo."""
    if not href:
        return ""
    if href.startswith("#"):
        return href
    internal = href.replace("https://www.growfinance.co", "").replace(
        "http://www.growfinance.co", ""
    )
    if internal != href:  # era un enlace interno
        if "/wp-content/uploads/" in internal:
            return ""  # enlaces a archivos originales: se descartan
        slug = internal.strip("/")
        if not slug:
            return "/"
        return f"/blog/{slug}/" if slug not in ("servicios", "nosotros", "contacto") else "/"
    return href


def resolve_image(src, image_map):
    """Traduce el src de WordPress a la ruta local ya descargada."""
    if src in image_map:
        return "/" + image_map[src].lstrip("/")
    base = src.split("/")[-1]
    for original, local in image_map.items():
        if original.split("/")[-1] == base:
            return "/" + local.lstrip("/")
    return None


def extract(html, image_map):
    """Recorre el árbol y emite los bloques de contenido en orden."""
    soup = BeautifulSoup(html, "html.parser")
    blocks = []
    seen_images = set()

    for el in soup.find_all(True):
        name = el.name

        # Imágenes: se emiten una sola vez y sin el <a> que las envuelve.
        if name == "img":
            local = resolve_image(el.get("src", ""), image_map)
            if local and local not in seen_images:
                seen_images.add(local)
                alt = (el.get("alt") or "").strip()
                blocks.append(("img", local, alt))
            continue

        # Títulos de Elementor: viven en un div, no en una etiqueta de encabezado.
        classes = " ".join(el.get("class", []))
        if "elementor-heading-title" in classes or "elementor-tab-title" in classes:
            text = clean_inline(el, image_map).strip()
            if text:
                blocks.append(("h3", text, None))
            continue

        if name in BLOCK_TAGS:
            # Evita duplicar el contenido de listas anidadas en otro bloque.
            if el.find_parent(["ul", "ol", "blockquote"]):
                continue
            if name in ("ul", "ol"):
                items = [
                    clean_inline(li, image_map).strip()
                    for li in el.find_all("li", recursive=False)
                ]
                items = [i for i in items if i]
                if items:
                    blocks.append((name, items, None))
            else:
                text = clean_inline(el, image_map).strip()
                if text and text not in ("&nbsp;", "\xa0"):
                    blocks.append((name, text, None))

    return dedupe(blocks)


def dedupe(blocks):
    """Elementor repite texto entre contenedores; se elimina lo repetido."""
    out, seen = [], set()
    for kind, value, extra in blocks:
        key = (kind, value if isinstance(value, str) else tuple(value))
        if key in seen:
            continue
        seen.add(key)
        out.append((kind, value, extra))
    return out


def render(blocks):
    """Convierte los bloques extraídos en HTML final."""
    html = []
    for kind, value, extra in blocks:
        if kind == "img":
            alt = extra or ""
            html.append(
                f'<figure><img src="{value}" alt="{alt}" loading="lazy" '
                f'decoding="async"/></figure>'
            )
        elif kind in ("ul", "ol"):
            items = "".join(f"<li>{i}</li>" for i in value)
            html.append(f"<{kind}>{items}</{kind}>")
        else:
            html.append(f"<{kind}>{value}</{kind}>")
    return "\n".join(html)
