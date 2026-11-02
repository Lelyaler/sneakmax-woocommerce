<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/favicon.svg' ); ?>" type="image/svg+xml">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="theme-color" content="#111111">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site-container">
  <header class="header fix-block">
    <div class="container grid header__container">
      <div class="header__left">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo header__logo" aria-label="<?php bloginfo( 'name' ); ?>">
          SneakMax
        </a>
      </div>
      <div class="header__right">
        <nav class="nav header__nav" id="headerNav" aria-label="<?php esc_attr_e( 'Основная навигация', 'sneakmax' ); ?>">
          <ul class="nav__list list-reset">
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/#catalog' ) ); ?>" class="nav__link"><?php esc_html_e( 'Каталог', 'sneakmax' ); ?></a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/#about' ) ); ?>" class="nav__link"><?php esc_html_e( 'О нас', 'sneakmax' ); ?></a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/#quiz' ) ); ?>" class="nav__link"><?php esc_html_e( 'Подбор товара', 'sneakmax' ); ?></a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/#team' ) ); ?>" class="nav__link"><?php esc_html_e( 'Наша команда', 'sneakmax' ); ?></a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>" class="nav__link"><?php esc_html_e( 'Доставка и оплата', 'sneakmax' ); ?></a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/#contacts' ) ); ?>" class="nav__link"><?php esc_html_e( 'Контакты', 'sneakmax' ); ?></a>
            </li>
          </ul>
        </nav>
        <button class="burger btn-reset" aria-label="<?php esc_attr_e( 'Открыть навигационное меню', 'sneakmax' ); ?>" aria-expanded="false" aria-controls="headerNav">
          <span class="burger__line"></span>
        </button>
        <div class="cart header__cart">
          <button class="btn-reset cart__btn wfcd-open-cart" aria-label="<?php esc_attr_e( 'Корзина товаров', 'sneakmax' ); ?>">
            <svg>
              <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/img/sprite.svg#cart' ); ?>"></use>
            </svg>
            <div class="cart__count wfcd-cart-counter">
              <?php echo ( function_exists( 'WC' ) && WC()->cart ) ? esc_html( WC()->cart->get_cart_contents_count() ) : '0'; ?>
            </div>
          </button>
          <div class="mini-cart">
            <div class="mini-cart__top" data-simplebar>
              <ul class="mini-cart__list list-reset">
                <?php
                if ( function_exists( 'WC' ) && WC()->cart && ! WC()->cart->is_empty() ) :
                  foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                      $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                      ?>
                      <li class="mini-cart__item" data-id="<?php echo esc_attr( $_product->get_id() ); ?>">
                        <article class="mini-cart__product">
                          <img src="<?php echo esc_url( wp_get_attachment_image_url( $_product->get_image_id(), 'thumbnail' ) ); ?>" alt="" class="mini-cart__image" width="60" height="60" />
                          <div class="mini-cart__content">
                            <h4 class="mini-cart__title"><?php echo esc_html( $_product->get_name() ); ?></h4>
                            <span class="mini-cart__price"><?php echo wp_kses_post( WC()->cart->get_product_price( $_product ) ); ?> × <?php echo esc_html( $cart_item['quantity'] ); ?></span>
                          </div>
                        </article>
                      </li>
                      <?php
                    endif;
                  endforeach;
                else :
                  echo '<li class="mini-cart__empty">' . esc_html__( 'Корзина пуста', 'sneakmax' ) . '</li>';
                endif;
                ?>
              </ul>
            </div>
            <div class="mini-cart__bottom">
              <div class="mini-cart__itog">
                <span class="mini-cart__txt"><?php esc_html_e( 'Итого:', 'sneakmax' ); ?></span>
                <span class="mini-cart__summ"><?php echo ( function_exists( 'WC' ) && WC()->cart ) ? wp_kses_post( WC()->cart->get_cart_subtotal() ) : '0 ₽'; ?></span>
              </div>
              <a href="<?php echo function_exists( 'wc_get_cart_url' ) ? esc_url( wc_get_cart_url() ) : '#'; ?>" class="btn-reset btn btn--primary mini-cart__btn">
                <?php esc_html_e( 'Оформить заказ', 'sneakmax' ); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="main">
