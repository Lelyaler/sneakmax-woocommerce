<?php
/**
 * The main template file
 *
 * @package Sneakmax
 */

get_header();
?>

<div class="container page-content-container">
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) :
      the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-content" style="margin-top: 24px; line-height: 1.6;">
          <?php the_content(); ?>
        </div>
      </article>
      <?php
    endwhile;
  else :
    echo '<p>' . esc_html__( 'Записи не найдены.', 'sneakmax' ) . '</p>';
  endif;
  ?>
</div>

<?php
get_footer();
