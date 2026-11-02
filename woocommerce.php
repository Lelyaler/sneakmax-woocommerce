<?php
/**
 * WooCommerce main fallback template
 *
 * @package Sneakmax
 */

get_header();
?>

<div class="container sneakmax-woocommerce-container">
  <?php woocommerce_content(); ?>
</div>

<?php
get_footer();
