<?php
/**
 * Listado del blog.
 *
 * @package grow
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container-wide blog-hero">
  <h1><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ?: 'Blog' ); ?></h1>
  <p>Art&iacute;culos sobre flujo de caja, gesti&oacute;n financiera y crecimiento empresarial.</p>
</div>

<div class="container-wide">
  <?php if ( have_posts() ) : ?>
  <div class="post-grid">
    <?php while ( have_posts() ) : the_post(); ?>
    <a class="post-card" href="<?php the_permalink(); ?>">
      <div class="post-card-body">
        <span class="tag" style="align-self:flex-start"><?php echo esc_html( grow_primary_category() ); ?></span>
        <h2><?php the_title(); ?></h2>
        <p><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 22, '…' ) ); ?></p>
        <span class="date"><?php echo esc_html( grow_fecha_es() ); ?></span>
      </div>
    </a>
    <?php endwhile; ?>
  </div>

  <div class="pagination">
    <?php echo wp_kses_post( paginate_links( array( 'type' => 'plain', 'prev_text' => '&laquo;', 'next_text' => '&raquo;' ) ) ); ?>
  </div>
  <?php else : ?>
  <div class="blog-empty">
    <h2>Estamos preparando el pr&oacute;ximo art&iacute;culo.</h2>
    <p>Muy pronto publicaremos contenido sobre flujo de caja, estructura financiera y crecimiento empresarial. Mientras tanto, podemos revisar tus n&uacute;meros contigo.</p>
    <a href="<?php echo esc_url( home_url( '/#form' ) ); ?>" class="btn-cta">Agenda una sesi&oacute;n gratuita</a>
  </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
