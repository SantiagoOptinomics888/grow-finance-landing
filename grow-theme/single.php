<?php
/**
 * Entrada individual del blog.
 *
 * @package grow
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<article <?php post_class(); ?>>
  <div class="container post-header">
    <div class="breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a> &rsaquo;
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog</a>
    </div>
    <div class="post-meta">
      <span class="tag"><?php echo esc_html( grow_primary_category() ); ?></span>
      <span><?php echo esc_html( grow_fecha_es() ); ?></span>
      <span>&middot;</span>
      <span><?php echo esc_html( grow_reading_time() ); ?> min de lectura</span>
    </div>
    <h1 class="post-title"><?php the_title(); ?></h1>
  </div>

  <div class="container post-body">
    <?php
    if ( has_post_thumbnail() ) {
    	the_post_thumbnail( 'large', array( 'loading' => 'eager' ) );
    }
    the_content();
    ?>
  </div>
</article>

<div class="container">
  <div class="post-cta">
    <h2>&iquest;Quieres que tus finanzas dejen de ser un problema?</h2>
    <p>Agenda una sesi&oacute;n gratuita de 30 minutos con un director financiero de Grow Finance.</p>
    <a href="<?php echo esc_url( home_url( '/#form' ) ); ?>" class="btn-cta">Agenda tu sesi&oacute;n gratuita</a>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
