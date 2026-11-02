<?php
/**
 * Render template for Sneakmax AJAX Catalog Block.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block inner content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title          = ! empty( $attributes['title'] ) ? esc_html( $attributes['title'] ) : esc_html__( 'Каталог кроссовок', 'sneakmax' );
$posts_per_page = isset( $attributes['postsPerPage'] ) ? (int) $attributes['postsPerPage'] : 9;
$total_count    = function_exists( 'wp_count_posts' ) ? wp_count_posts( 'product' )->publish : 20;

$args = array(
	'post_type'      => 'product',
	'posts_per_page' => $posts_per_page,
	'post_status'    => 'publish',
);

$loop = new WP_Query( $args );
?>

<section class="catalog" id="catalog">
  <div class="container catalog__container">
    <div class="catalog__top">
      <h2 class="title catalog__title reveal"><?php echo $title; ?></h2>
      <span class="catalog__count"><?php printf( esc_html__( 'В наличии %d моделей', 'sneakmax' ), $total_count ? $total_count : 20 ); ?></span>
    </div>
    <div class="catalog__content">
      <div class="catalog__left">
        <div class="catalog-filters">
          <button type="button" class="btn-reset catalog-filters__toggle" aria-expanded="false" aria-controls="catalogFiltersBody">
            <span class="catalog-filters__toggle-left">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="4" y1="21" x2="4" y2="14"></line>
                <line x1="4" y1="10" x2="4" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12" y2="3"></line>
                <line x1="20" y1="21" x2="20" y2="16"></line>
                <line x1="20" y1="12" x2="20" y2="3"></line>
                <line x1="1" y1="14" x2="7" y2="14"></line>
                <line x1="9" y1="8" x2="15" y2="8"></line>
                <line x1="17" y1="16" x2="23" y2="16"></line>
              </svg>
              <span><?php esc_html_e( 'Фильтры каталога', 'sneakmax' ); ?></span>
            </span>
            <svg class="catalog-filters__toggle-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
          <div class="catalog-filters__body" id="catalogFiltersBody">
            <div class="catalog-filters__top">
              <h3 class="catalog-filters__title"><?php esc_html_e( 'Подбор по параметрам', 'sneakmax' ); ?></h3>
            </div>
            <div class="catalog-filters__content">
              <div class="catalog-filter-block">
                <h4 class="catalog-filter-block__title"><?php esc_html_e( 'Цена, руб.', 'sneakmax' ); ?></h4>
                <div class="catalog-filter-block__prices">
                  <input type="text" class="catalog-filter-block__price catalog-filter-block__price--min" value="1850">
                  <input type="text" class="catalog-filter-block__price catalog-filter-block__price--max" value="25768">
                </div>
                <div class="catalog-filter-block__slider" id="range-slider"></div>
              </div>

              <div class="catalog-filter-block">
                <h4 class="catalog-filter-block__title"><?php esc_html_e( 'Пол', 'sneakmax' ); ?></h4>
                <ul class="catalog-filter-block__list list-reset">
                  <li class="catalog-filter-block__item">
                    <label class="custom-checkbox">
                      <input type="checkbox" class="custom-checkbox__field" name="gender" value="Мужской">
                      <span class="custom-checkbox__content"><?php esc_html_e( 'Мужской', 'sneakmax' ); ?></span>
                    </label>
                  </li>
                  <li class="catalog-filter-block__item">
                    <label class="custom-checkbox">
                      <input type="checkbox" class="custom-checkbox__field" name="gender" value="Женский">
                      <span class="custom-checkbox__content"><?php esc_html_e( 'Женский', 'sneakmax' ); ?></span>
                    </label>
                  </li>
                </ul>
              </div>

              <div class="catalog-filters__btns">
                <button type="button" class="btn-reset button button-primary catalog-filters__btn catalog-filters__btn--apply"><?php esc_html_e( 'Применить', 'sneakmax' ); ?></button>
                <button type="button" class="btn-reset button button-second catalog-filters__btn catalog-filters__btn--reset"><?php esc_html_e( 'Сбросить', 'sneakmax' ); ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="catalog__right">
        <div class="catalog__grid" id="catalogGrid">
          <?php
          if ( $loop->have_posts() ) :
            while ( $loop->have_posts() ) : $loop->the_post();
              global $product;
              $prod_id = get_the_ID();
              $image = get_the_post_thumbnail_url( $prod_id, 'medium' );
              if ( ! $image ) {
                $image = get_template_directory_uri() . '/img/product-1.webp';
              }
              $price = $product ? $product->get_price() : '11000';
              $reg_price = $product ? $product->get_regular_price() : '12900';
              $on_sale = $product ? $product->is_on_sale() : true;
          ?>
            <article class="product-card catalog-product-card" data-product-id="<?php echo esc_attr( $prod_id ); ?>">
              <?php if ( $on_sale ) : ?>
                <span class="product-card__badge"><?php esc_html_e( 'Скидка', 'sneakmax' ); ?></span>
              <?php endif; ?>
              <div class="product-card__visual">
                <img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title_attribute(); ?>" class="product-card__img" width="280" height="220" loading="lazy">
                <div class="product-card__actions">
                  <button type="button" class="btn-reset product-card__action-btn product-card__action-btn--view" data-product-id="<?php echo esc_attr( $prod_id ); ?>" aria-label="<?php esc_attr_e( 'Быстрый просмотр', 'sneakmax' ); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                      <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                  </button>
                  <button type="button" class="btn-reset product-card__action-btn product-card__action-btn--cart" data-product-id="<?php echo esc_attr( $prod_id ); ?>" aria-label="<?php esc_attr_e( 'Добавить в корзину', 'sneakmax' ); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="9" cy="21" r="1"></circle>
                      <circle cx="20" cy="21" r="1"></circle>
                      <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                  </button>
                  <button type="button" class="btn-reset product-card__action-btn product-card__action-btn--buy" data-product-id="<?php echo esc_attr( $prod_id ); ?>" aria-label="<?php esc_attr_e( 'Купить в 1 клик', 'sneakmax' ); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="product-card__content">
                <h3 class="product-card__title"><?php the_title(); ?></h3>
                <div class="product-card__prices">
                  <span class="product-card__price product-card__price--current"><?php echo esc_html( number_format( (float) $price, 0, '', ' ' ) ); ?> ₽</span>
                  <?php if ( $on_sale && $reg_price ) : ?>
                    <span class="product-card__price product-card__price--old"><?php echo esc_html( number_format( (float) $reg_price, 0, '', ' ' ) ); ?> ₽</span>
                  <?php endif; ?>
                </div>
              </div>
            </article>
          <?php
            endwhile;
            wp_reset_postdata();
          else :
            echo '<p class="catalog__empty">' . esc_html__( 'Товары отсутствуют.', 'sneakmax' ) . '</p>';
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
