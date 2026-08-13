<?php
/**
 * Página simple. La portada usa front-page.php, no este archivo.
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
    <h1 class="post-title"><?php the_title(); ?></h1>
  </div>
  <div class="container post-body"><?php the_content(); ?></div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>
