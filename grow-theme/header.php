<?php
/**
 * Cabecera de las páginas interiores (blog, páginas simples, 404).
 * La portada no usa este archivo: lleva su propia cabecera embebida.
 *
 * @package grow
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="nav">
  <div class="nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wordmark">Grow</a>
    <div class="nav-links">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hide-sm">Inicio</a>
      <a href="<?php echo esc_url( home_url( '/#proceso' ) ); ?>" class="hide-sm">Cómo funciona</a>
      <a href="<?php echo esc_url( home_url( '/#form' ) ); ?>" class="btn-nav">Agenda gratuita</a>
    </div>
  </div>
</nav>
