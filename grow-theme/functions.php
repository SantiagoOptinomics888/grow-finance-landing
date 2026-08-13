<?php
/**
 * Grow Finance — configuración del tema.
 *
 * @package grow
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Acceso directo no permitido.
}

define( 'GROW_VERSION', '1.0.0' );

/**
 * Identificador del contenedor de Google Tag Manager, heredado del sitio anterior.
 */
if ( ! defined( 'GROW_GTM_ID' ) ) {
	define( 'GROW_GTM_ID', 'GTM-MWJHGNGC' );
}

/**
 * Capacidades del tema.
 */
function grow_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'grow_setup' );

/**
 * Hojas de estilo y tipografías.
 *
 * La portada lleva su CSS embebido, así que solo carga las fuentes.
 */
function grow_assets() {
	$fonts = 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap';
	wp_enqueue_style( 'grow-fonts', $fonts, array(), null );

	if ( ! is_front_page() ) {
		wp_enqueue_style( 'grow-style', get_stylesheet_uri(), array( 'grow-fonts' ), GROW_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'grow_assets' );

/**
 * Quita el CSS de bloques de WordPress, que no usa este tema.
 */
function grow_dequeue_block_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'grow_dequeue_block_styles', 100 );

/**
 * Oculta la barra de emojis y el generador: peso muerto en un sitio de marketing.
 */
function grow_cleanup_head() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
}
add_action( 'init', 'grow_cleanup_head' );

/**
 * Devuelve la URL de un archivo dentro de assets/.
 *
 * @param string $path Ruta relativa dentro de assets/.
 * @return string URL absoluta.
 */
function grow_asset( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/**
 * URL del listado del blog.
 *
 * Usa la página asignada en Ajustes → Lectura; si no hay ninguna,
 * cae a la portada para no generar un enlace roto.
 *
 * @return string
 */
function grow_blog_url() {
	$page_id = (int) get_option( 'page_for_posts' );
	if ( $page_id > 0 ) {
		$url = get_permalink( $page_id );
		if ( $url ) {
			return $url;
		}
	}
	return home_url( '/' );
}

/**
 * Tiempo estimado de lectura de la entrada actual.
 *
 * @param int $post_id ID de la entrada.
 * @return int Minutos, mínimo 1.
 */
function grow_reading_time( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$texto   = wp_strip_all_tags( get_post_field( 'post_content', $post_id ) );
	// str_word_count() no cuenta bien las palabras acentuadas del español.
	$words = count( preg_split( '/\s+/u', trim( $texto ), -1, PREG_SPLIT_NO_EMPTY ) );
	return max( 1, (int) round( $words / 200 ) );
}

/**
 * Nombre de la primera categoría útil de la entrada.
 *
 * @return string
 */
function grow_primary_category() {
	$categories = get_the_category();
	foreach ( $categories as $category ) {
		if ( 'uncategorized' !== $category->slug ) {
			return $category->name;
		}
	}
	return 'Finanzas';
}

/**
 * Fecha en español, sin depender de la configuración regional del servidor.
 *
 * @param string $format Formato base (no usado, se mantiene la firma simple).
 * @return string
 */
function grow_fecha_es() {
	$meses = array(
		1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
		5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
		9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre',
	);
	$dia  = (int) get_the_date( 'j' );
	$mes  = (int) get_the_date( 'n' );
	$anio = get_the_date( 'Y' );
	return sprintf( '%d de %s de %s', $dia, $meses[ $mes ], $anio );
}

/**
 * Etiquetas Open Graph, para que los enlaces compartidos muestren vista previa.
 */
function grow_open_graph() {
	$default_image = grow_asset( 'img/og-grow.jpg' );

	if ( is_singular() ) {
		$title = get_the_title();
		$desc  = wp_strip_all_tags( get_the_excerpt() );
		$url   = get_permalink();
		$image = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'large' ) : $default_image;
		$type  = 'article';
	} else {
		$title = get_bloginfo( 'name' );
		$desc  = get_bloginfo( 'description' );
		$url   = home_url( '/' );
		$image = $default_image;
		$type  = 'website';
	}

	printf( '<meta property="og:type" content="%s" />' . "\n", esc_attr( $type ) );
	printf( '<meta property="og:title" content="%s" />' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s" />' . "\n", esc_attr( $desc ) );
	printf( '<meta property="og:url" content="%s" />' . "\n", esc_url( $url ) );
	printf( '<meta property="og:image" content="%s" />' . "\n", esc_url( $image ) );
	printf( '<meta property="og:site_name" content="%s" />' . "\n", esc_attr( get_bloginfo( 'name' ) ) );
	echo '<meta property="og:locale" content="es_CO" />' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	printf( '<meta name="twitter:image" content="%s" />' . "\n", esc_url( $image ) );
}
add_action( 'wp_head', 'grow_open_graph', 5 );

/**
 * Resumen de la página actual, reutilizado por la meta descripción y por
 * Open Graph.
 *
 * @param int $limite Longitud máxima.
 * @return string
 */
function grow_descripcion( $limite = 155 ) {
	if ( is_front_page() && ! is_home() ) {
		return 'Transforma las finanzas de tu empresa con dirección financiera estratégica. Más de 300 empresas ya optimizaron su flujo de caja con Grow Finance.';
	}

	if ( is_home() ) {
		return 'Artículos sobre flujo de caja, gestión financiera y crecimiento empresarial, escritos por el equipo de Grow Finance.';
	}

	if ( is_singular() ) {
		$texto = wp_strip_all_tags( get_the_excerpt() );
		if ( '' === trim( $texto ) ) {
			$texto = wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) );
		}
		$texto = trim( preg_replace( '/\s+/u', ' ', $texto ) );
		if ( mb_strlen( $texto ) > $limite ) {
			$texto = mb_substr( $texto, 0, $limite );
			$texto = mb_substr( $texto, 0, max( 1, (int) mb_strrpos( $texto, ' ' ) ) ) . '…';
		}
		return $texto;
	}

	return (string) get_bloginfo( 'description' );
}

/**
 * Meta descripción y enlace canónico.
 *
 * WordPress no genera meta descripción por sí solo, y sin un plugin de SEO
 * las entradas y el listado del blog salían sin ella.
 */
function grow_meta_basicos() {
	$desc = grow_descripcion();
	if ( '' !== $desc ) {
		printf( '<meta name="description" content="%s" />' . "\n", esc_attr( $desc ) );
	}

	// El canónico del listado de entradas no lo cubre WordPress.
	if ( is_home() && ! is_front_page() ) {
		printf(
			'<link rel="canonical" href="%s" />' . "\n",
			esc_url( grow_blog_url() )
		);
	}
}
add_action( 'wp_head', 'grow_meta_basicos', 4 );

/**
 * Datos estructurados en formato JSON-LD.
 *
 * Permiten a los buscadores entender qué es cada página. En las entradas se
 * declara el artículo; en la portada, la organización.
 */
function grow_datos_estructurados() {
	$logo = grow_asset( 'img/og-grow.jpg' );

	if ( is_singular( 'post' ) ) {
		$imagen = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'large' ) : $logo;
		$datos  = array(
			'@context'         => 'https://schema.org',
			'@type'            => 'BlogPosting',
			'headline'         => wp_strip_all_tags( get_the_title() ),
			'description'      => grow_descripcion(),
			'image'            => $imagen,
			'datePublished'    => get_the_date( 'c' ),
			'dateModified'     => get_the_modified_date( 'c' ),
			'inLanguage'       => 'es-CO',
			'author'           => array( '@type' => 'Organization', 'name' => 'Grow Finance', 'url' => home_url( '/' ) ),
			'publisher'        => array(
				'@type' => 'Organization',
				'name'  => 'Grow Finance',
				'logo'  => array( '@type' => 'ImageObject', 'url' => $logo ),
			),
			'mainEntityOfPage' => array( '@type' => 'WebPage', '@id' => get_permalink() ),
		);
	} elseif ( is_front_page() && ! is_home() ) {
		$datos = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'ProfessionalService',
			'name'        => 'Grow Finance',
			'description' => grow_descripcion(),
			'url'         => home_url( '/' ),
			'image'       => $logo,
			'telephone'   => '+57 300 738 4060',
			'email'       => 'hola@growfinance.co',
			'areaServed'  => 'CO',
			'sameAs'      => array(
				'https://instagram.com/growxfinance',
				'https://linkedin.com/company/www.growfinance.co',
				'https://youtube.com/@GrowxFinance2026',
			),
		);
	} else {
		return;
	}

	echo '<script type="application/ld+json">'
		. wp_json_encode( $datos, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
		. '</script>' . "\n";
}
add_action( 'wp_head', 'grow_datos_estructurados', 6 );

/**
 * Icono del sitio, si no se ha configurado uno desde el personalizador.
 */
function grow_favicon() {
	if ( ! has_site_icon() ) {
		printf( '<link rel="icon" href="%s" />' . "\n", esc_url( grow_asset( 'favicon.svg' ) ) );
	}
}
add_action( 'wp_head', 'grow_favicon' );

/**
 * Google Tag Manager: contenedor heredado del sitio anterior.
 */
function grow_gtm_head() {
	?>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','<?php echo esc_js( GROW_GTM_ID ); ?>');</script>
	<?php
}

add_action( 'wp_head', 'grow_gtm_head', 1 );

/**
 * Versión sin JavaScript de Google Tag Manager.
 */
function grow_gtm_body() {
	printf(
		'<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=%s" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>',
		esc_attr( GROW_GTM_ID )
	);
}
add_action( 'wp_body_open', 'grow_gtm_body' );

/**
 * Fuerza el uso de front-page.php en la portada.
 *
 * Elementor engancha template_include y, cuando la página tiene asignado uno
 * de sus diseños ("Full Width" o "Canvas"), devuelve su propia plantilla y se
 * salta la jerarquía del tema. El resultado es que la portada seguía
 * mostrando el contenido antiguo maquetado con Elementor.
 *
 * También cubre el caso de páginas con plantillas heredadas del tema anterior
 * (page_front-page.php), que ya no existen aquí.
 *
 * La prioridad alta asegura que se ejecute después de Elementor.
 *
 * @param string $template Ruta de la plantilla que se va a cargar.
 * @return string Ruta definitiva.
 */
function grow_forzar_portada( $template ) {
	// is_home() distingue el caso en que la portada muestra las entradas:
	// ahí manda home.php, no front-page.php.
	if ( is_front_page() && ! is_home() ) {
		$portada = locate_template( 'front-page.php' );
		if ( $portada ) {
			return $portada;
		}
	}

	// Las entradas del blog sufren el mismo secuestro: sin esto pierden el
	// título como H1, la fecha, la categoría y el llamado a la acción, porque
	// Elementor imprime solo el contenido. Las páginas quedan fuera a
	// propósito: Servicios, Nosotros y Contacto siguen maquetadas con
	// Elementor y deben seguir renderizándose con él.
	if ( is_singular( 'post' ) ) {
		$entrada = locate_template( 'single.php' );
		if ( $entrada ) {
			return $entrada;
		}
	}

	return $template;
}
add_filter( 'template_include', 'grow_forzar_portada', 999 );

/**
 * Retira los recursos de Elementor en la portada.
 *
 * La portada ya no usa Elementor, pero el plugin sigue encolando su CSS y su
 * JavaScript. Son cientos de kilobytes en la página más visitada del sitio.
 * Solo se retira aquí: el resto de páginas mantiene Elementor intacto.
 */
function grow_sin_elementor_en_portada() {
	if ( ! is_front_page() || is_home() ) {
		return;
	}

	// Se filtra por patrón y no por una lista de nombres: Elementor genera
	// identificadores que dependen del sitio (elementor-post-3, widget-*,
	// elementor-gf-* para sus tipografías) y una lista fija se queda corta.
	foreach ( array( wp_styles(), wp_scripts() ) as $cola ) {
		$es_estilo = ( $cola instanceof WP_Styles );
		foreach ( (array) $cola->queue as $handle ) {
			$src = isset( $cola->registered[ $handle ] ) ? (string) $cola->registered[ $handle ]->src : '';
			$de_elementor = ( 0 === strpos( $handle, 'elementor' ) )
				|| ( 0 === strpos( $handle, 'e-' ) )
				|| ( false !== strpos( $src, '/plugins/elementor' ) );

			if ( $de_elementor ) {
				if ( $es_estilo ) {
					wp_dequeue_style( $handle );
				} else {
					wp_dequeue_script( $handle );
				}
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', 'grow_sin_elementor_en_portada', 200 );

/**
 * Título del documento en la portada.
 *
 * Sin esto se usaría el nombre del sitio guardado en Ajustes, que sigue
 * siendo el del sitio anterior.
 *
 * @param array $partes Partes del título que compone WordPress.
 * @return array
 */
function grow_titulo_portada( $partes ) {
	if ( is_front_page() && ! is_home() ) {
		$partes['title']   = 'Grow Finance — Dirección Financiera Estratégica para empresas en crecimiento';
		$partes['tagline'] = '';
		unset( $partes['site'] );
	}
	return $partes;
}
add_filter( 'document_title_parts', 'grow_titulo_portada' );

/**
 * Direcciones del sitio anterior que ya no existen.
 *
 * Al eliminar las entradas antiguas, sus URLs quedarían devolviendo 404 para
 * quien llegue desde Google o desde un enlace externo. Se redirigen a la
 * portada con un 301 para no perder esas visitas.
 *
 * Si en el futuro se publica una entrada con alguno de estos slugs, la
 * comprobación de is_404() evita que la redirección la intercepte.
 */
function grow_redirect_urls_antiguas() {
	if ( ! is_404() ) {
		return;
	}

	$slugs_retirados = array(
		'como-mejorar-el-flujo-de-caja-de-mi-empresa',
		'gestion-financiera-pymes',
		'que-sucede-cuando-los-costos-del-producto-comienzan-a-elevarse-afectando-los-margenes-de-ganancia-y-poniendo-en-riesgo-tu-viabilidad-economica',
		'la-asesoria-financiera-para-empresas-una-alternativa-clave-para-navegar-en-tiempos-de-incertidumbre-economica',
		'analisis-financiero-integral',
		'que-es-mejor-comprar-vivienda-o-arrendar',
		'ahorro',
		'salud-financiera',
		'potencia-tu-pyme',
		'creditos-en-colombia',
		'oportunidades-de-inversion',
		'servicios',
		'nosotros',
		'contacto',
		'elementor-1667',
	);

	$ruta  = wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH );
	$slug  = trim( (string) $ruta, '/' );
	$slug  = sanitize_title( basename( $slug ) );

	if ( in_array( $slug, $slugs_retirados, true ) ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'grow_redirect_urls_antiguas' );

/**
 * Longitud del resumen en los listados.
 *
 * @return int
 */
function grow_excerpt_length() {
	return 24;
}
add_filter( 'excerpt_length', 'grow_excerpt_length' );

/**
 * Terminación del resumen.
 *
 * @return string
 */
function grow_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'grow_excerpt_more' );
