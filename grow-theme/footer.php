<?php
/**
 * Pie de las páginas interiores.
 *
 * @package grow
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<footer class="site-footer">
  <div class="footer-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wordmark">Grow</a>
    <div class="footer-links">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
      <a href="<?php echo esc_url( home_url( '/#proceso' ) ); ?>">Cómo funciona</a>
      <a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">Preguntas frecuentes</a>
      <a href="<?php echo esc_url( home_url( '/#form' ) ); ?>">Contacto</a>
      <a href="https://wa.me/573007384060" target="_blank" rel="noopener">WhatsApp</a>
    </div>
  </div>
  <div class="footer-bottom">
    &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Grow Finance. Todos los derechos reservados.
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
