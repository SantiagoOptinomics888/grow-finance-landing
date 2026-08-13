<?php
/**
 * Página no encontrada.
 *
 * @package grow
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container simple-page">
  <h1>Esta p&aacute;gina ya no existe.</h1>
  <p>Es posible que el contenido se haya movido. Desde la portada puedes encontrar todo lo que necesitas.</p>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-cta">Ir a la portada</a>
</div>

<?php get_footer(); ?>
