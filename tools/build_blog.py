"""Genera el blog estático a partir del respaldo de WordPress.

Lee backup/wp-posts.json y produce:
  blog/index.html                 índice con todas las entradas
  blog/<slug>/index.html          una página por entrada
  sitemap.xml                     portada + todas las entradas

Uso:  python tools/build_blog.py
"""
import html
import json
import os
import re
import sys
from datetime import datetime

sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
from extract_content import extract, render, load_image_map  # noqa: E402

SITE = "https://www.growfinance.co"
GTM_ID = "GTM-MWJHGNGC"
OUT_DIR = "blog"
WORDS_PER_MINUTE = 200

MESES = [
    "enero", "febrero", "marzo", "abril", "mayo", "junio",
    "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre",
]


def fecha_es(iso):
    d = datetime.fromisoformat(iso)
    return f"{d.day} de {MESES[d.month - 1]} de {d.year}"


def texto_plano(markup):
    return re.sub(r"\s+", " ", re.sub(r"<[^>]+>", " ", markup)).strip()


def tiempo_lectura(markup):
    palabras = len(texto_plano(markup).split())
    return max(1, round(palabras / WORDS_PER_MINUTE))


def limpia_titulo(raw):
    return html.unescape(re.sub(r"<[^>]+>", "", raw)).strip()


def resumen(post, cuerpo, limite=155):
    fuente = texto_plano(post["excerpt"]["rendered"]) or texto_plano(cuerpo)
    fuente = html.unescape(fuente).replace("[…]", "").replace("[&hellip;]", "").strip()
    if len(fuente) <= limite:
        return fuente
    corte = fuente[:limite].rsplit(" ", 1)[0]
    return corte + "…"


def cabecera(titulo, descripcion, url, imagen, extra=""):
    """<head> compartido por todas las páginas del blog."""
    img_abs = f"{SITE}{imagen}" if imagen else f"{SITE}/images/og-grow.jpg"
    return f"""<!DOCTYPE html>
<html lang="es-CO">
<head>
<meta charset="UTF-8" />
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){{w[l]=w[l]||[];w[l].push({{'gtm.start':
new Date().getTime(),event:'gtm.js'}});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
}})(window,document,'script','dataLayer','{GTM_ID}');</script>
<!-- End Google Tag Manager -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{html.escape(titulo)}</title>
<meta name="description" content="{html.escape(descripcion)}" />
<link rel="canonical" href="{url}" />
<meta name="robots" content="index, follow, max-image-preview:large" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{url}" />
<meta property="og:site_name" content="Grow Finance" />
<meta property="og:title" content="{html.escape(titulo)}" />
<meta property="og:description" content="{html.escape(descripcion)}" />
<meta property="og:locale" content="es_CO" />
<meta property="og:image" content="{img_abs}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="{img_abs}" />
<link rel="icon" href="/favicon.svg" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/blog.css" />
{extra}</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={GTM_ID}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<nav class="nav">
  <div class="nav-inner">
    <a href="/" class="wordmark">Grow</a>
    <div class="nav-links">
      <a href="/blog/" class="hide-sm">Blog</a>
      <a href="/#proceso" class="hide-sm">Cómo funciona</a>
      <a href="/#form" class="btn-nav">Agenda gratuita</a>
    </div>
  </div>
</nav>
"""


PIE = """
<footer>
  <div class="footer-inner">
    <a href="/" class="wordmark">Grow</a>
    <div class="footer-links">
      <a href="/">Inicio</a>
      <a href="/blog/">Blog</a>
      <a href="/#proceso">Cómo funciona</a>
      <a href="/#faq">Preguntas frecuentes</a>
      <a href="/#form">Contacto</a>
    </div>
  </div>
  <div class="footer-bottom">© 2026 Grow Finance. Todos los derechos reservados.</div>
</footer>
</body>
</html>
"""

CTA = """
<div class="container">
  <div class="post-cta">
    <h2>¿Quieres que tus finanzas dejen de ser un problema?</h2>
    <p>Agenda una sesión gratuita de 30 minutos con un director financiero de Grow Finance.</p>
    <a href="/#form" class="btn-cta">Agenda tu sesión gratuita</a>
  </div>
</div>
"""


def datos_estructurados(titulo, descripcion, url, imagen, publicado, modificado):
    """JSON-LD de artículo, para resultados enriquecidos en buscadores."""
    data = {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": titulo,
        "description": descripcion,
        "image": f"{SITE}{imagen}" if imagen else f"{SITE}/images/og-grow.jpg",
        "datePublished": publicado,
        "dateModified": modificado,
        "author": {"@type": "Organization", "name": "Grow Finance", "url": SITE},
        "publisher": {
            "@type": "Organization",
            "name": "Grow Finance",
            "logo": {"@type": "ImageObject", "url": f"{SITE}/images/og-grow.jpg"},
        },
        "mainEntityOfPage": {"@type": "WebPage", "@id": url},
        "inLanguage": "es-CO",
    }
    return (
        '<script type="application/ld+json">'
        + json.dumps(data, ensure_ascii=False)
        + "</script>\n"
    )


def construir():
    image_map = load_image_map()
    with open("backup/wp-posts.json", encoding="utf-8") as fh:
        posts = json.load(fh)
    with open("backup/wp-media.json", encoding="utf-8") as fh:
        media = {m["id"]: m for m in json.load(fh)}
    with open("backup/wp-categories.json", encoding="utf-8") as fh:
        cats = {c["id"]: c["name"] for c in json.load(fh)}

    posts.sort(key=lambda p: p["date"], reverse=True)
    entradas = []

    for post in posts:
        slug = post["slug"]
        titulo = limpia_titulo(post["title"]["rendered"])
        cuerpo = render(extract(post["content"]["rendered"], image_map))
        if not cuerpo.strip():
            print(f"  AVISO: {slug} quedó sin contenido, se omite")
            continue

        # Imagen destacada: la del campo de WordPress o la primera del cuerpo.
        imagen = None
        fm = post.get("featured_media", 0)
        if fm in media:
            src = media[fm]["source_url"]
            local = image_map.get(src)
            if local:
                imagen = "/" + local.lstrip("/")
        if not imagen:
            encontrada = re.search(r'<img src="([^"]+)"', cuerpo)
            if encontrada:
                imagen = encontrada.group(1)

        url = f"{SITE}/blog/{slug}/"
        desc = resumen(post, cuerpo)
        categoria = next(
            (cats[c] for c in post.get("categories", []) if cats.get(c) not in (None, "Uncategorized")),
            "Finanzas",
        )

        extra = datos_estructurados(
            titulo, desc, url, imagen, post["date"], post.get("modified", post["date"])
        )
        pagina = cabecera(f"{titulo} | Grow Finance", desc, url, imagen, extra)
        pagina += f"""
<article>
  <div class="container post-header">
    <div class="breadcrumb"><a href="/">Inicio</a> › <a href="/blog/">Blog</a></div>
    <div class="post-meta">
      <span class="tag">{html.escape(categoria)}</span>
      <span>{fecha_es(post['date'])}</span>
      <span>·</span>
      <span>{tiempo_lectura(cuerpo)} min de lectura</span>
    </div>
    <h1 class="post-title">{html.escape(titulo)}</h1>
  </div>
  <div class="container post-body">
{cuerpo}
  </div>
</article>
{CTA}{PIE}"""

        destino = os.path.join(OUT_DIR, slug)
        os.makedirs(destino, exist_ok=True)
        with open(os.path.join(destino, "index.html"), "w", encoding="utf-8") as fh:
            fh.write(pagina)

        entradas.append(
            {
                "slug": slug, "titulo": titulo, "desc": desc, "imagen": imagen,
                "fecha": post["date"], "categoria": categoria,
            }
        )
        print(f"  ok  blog/{slug}/ ({len(texto_plano(cuerpo).split())} palabras)")

    escribir_indice(entradas)
    escribir_sitemap(entradas)
    return entradas


def escribir_indice(entradas):
    url = f"{SITE}/blog/"
    desc = ("Artículos sobre flujo de caja, gestión financiera y crecimiento "
            "empresarial, escritos por el equipo de Grow Finance.")
    pagina = cabecera("Blog | Grow Finance", desc, url, "/images/og-grow.jpg")
    pagina += """
<div class="container-wide blog-hero">
  <h1>Blog</h1>
  <p>Artículos sobre flujo de caja, gestión financiera y crecimiento empresarial.</p>
</div>
<div class="container-wide">
  <div class="post-grid">
"""
    for e in entradas:
        img = (
            f'<div class="post-card-img"><img src="{e["imagen"]}" alt="" '
            f'loading="lazy" decoding="async"/></div>' if e["imagen"] else ""
        )
        pagina += f"""    <a class="post-card" href="/blog/{e['slug']}/">
      {img}
      <div class="post-card-body">
        <span class="tag" style="align-self:flex-start">{html.escape(e['categoria'])}</span>
        <h2>{html.escape(e['titulo'])}</h2>
        <p>{html.escape(e['desc'])}</p>
        <span class="date">{fecha_es(e['fecha'])}</span>
      </div>
    </a>
"""
    pagina += "  </div>\n</div>\n" + PIE
    os.makedirs(OUT_DIR, exist_ok=True)
    with open(os.path.join(OUT_DIR, "index.html"), "w", encoding="utf-8") as fh:
        fh.write(pagina)
    print(f"  ok  blog/index.html ({len(entradas)} entradas)")


def escribir_sitemap(entradas):
    urls = [(f"{SITE}/", "1.0", None), (f"{SITE}/blog/", "0.8", None)]
    urls += [(f"{SITE}/blog/{e['slug']}/", "0.6", e["fecha"][:10]) for e in entradas]
    cuerpo = "\n".join(
        "  <url>\n"
        f"    <loc>{loc}</loc>\n"
        + (f"    <lastmod>{mod}</lastmod>\n" if mod else "")
        + f"    <priority>{pri}</priority>\n"
        "  </url>"
        for loc, pri, mod in urls
    )
    with open("sitemap.xml", "w", encoding="utf-8") as fh:
        fh.write(
            '<?xml version="1.0" encoding="UTF-8"?>\n'
            '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n'
            f"{cuerpo}\n</urlset>\n"
        )
    print(f"  ok  sitemap.xml ({len(urls)} URLs)")


if __name__ == "__main__":
    print("Generando blog…")
    construir()
    print("Listo.")
