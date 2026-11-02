  </main>

  <footer class="footer">
    <div class="container footer__container">
      <div class="footer__left">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo footer__logo" aria-label="<?php bloginfo( 'name' ); ?>">
          SneakMax
        </a>
      </div>
      <div class="footer__right">
        <nav class="nav footer__nav" aria-label="<?php esc_attr_e( 'Меню в подвале', 'sneakmax' ); ?>">
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
      </div>
    </div>
  </footer>

  <!-- Quick View Modal -->
  <div class="modal">
    <div
      class="modal__container prod-modal"
      role="dialog"
      aria-modal="true"
      aria-labelledby="prodModalTitle"
      data-graph-target="prod-modal"
    >
      <button class="btn-reset modal__close" aria-label="<?php esc_attr_e( 'Закрыть модальное окно', 'sneakmax' ); ?>"></button>
      <div class="modal-content">
        <div class="prod-modal__top">
          <div class="modal-slider">
            <div class="modal-slider__container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/data/images/1/1.webp' ); ?>" alt="" width="280" height="293" loading="lazy" />
                </div>
              </div>
            </div>
            <div class="modal-preview"></div>
          </div>
          <div class="modal-info">
            <div class="modal-info__top">
              <span class="modal-info__vendor">Артикул: <span class="modal-vendor-val">879876</span></span>
              <span class="modal-info__quantity"><?php esc_html_e( 'В наличии:', 'sneakmax' ); ?> <span><?php esc_html_e( 'Есть на складе', 'sneakmax' ); ?></span></span>
            </div>
            <div class="modal-info__wrapper">
              <h3 class="modal-info__title" id="prodModalTitle">Кроссовки</h3>
              <div class="modal-info__rate">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/star.svg' ); ?>" alt="Рейтинг 5 из 5" width="16" height="16" loading="lazy" />
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/star.svg' ); ?>" alt="" aria-hidden="true" width="16" height="16" loading="lazy" />
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/star.svg' ); ?>" alt="" aria-hidden="true" width="16" height="16" loading="lazy" />
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/star.svg' ); ?>" alt="" aria-hidden="true" width="16" height="16" loading="lazy" />
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/star.svg' ); ?>" alt="" aria-hidden="true" width="16" height="16" loading="lazy" />
              </div>
              <div class="modal-info__sizes">
                <span class="modal-info__subtitle"><?php esc_html_e( 'Выберите размер', 'sneakmax' ); ?></span>
                <ul class="list-reset modal-info__sizes-list modal-sizes">
                  <li class="modal-sizes__item"><button class="btn-reset modal-sizes__btn modal-sizes__btn--active">39</button></li>
                  <li class="modal-sizes__item"><button class="btn-reset modal-sizes__btn">40</button></li>
                  <li class="modal-sizes__item"><button class="btn-reset modal-sizes__btn">41</button></li>
                  <li class="modal-sizes__item"><button class="btn-reset modal-sizes__btn">42</button></li>
                  <li class="modal-sizes__item"><button class="btn-reset modal-sizes__btn">43</button></li>
                </ul>
              </div>
              <div class="modal-info__price">
                <span class="modal-info__current-price">0 ₽</span>
                <span class="modal-info__old-price" style="display:none;"></span>
              </div>
            </div>
            <div style="display: flex; gap: 10px; margin-top: 15px;">
              <button class="btn btn-reset btn--primary modal-info__order" id="modalAddToCartBtn" style="flex: 1;">
                <?php esc_html_e( 'В корзину', 'sneakmax' ); ?>
              </button>
              <button class="btn btn-reset modal-info__order wfcd-quick-buy-btn" id="modalQuickBuyBtn" style="flex: 1; background-color: #444b54; color: #fff;">
                <?php esc_html_e( 'Купить в 1 клик', 'sneakmax' ); ?>
              </button>
            </div>
            <ul class="modal-info__note modal-note list-reset">
              <li class="modal-note__item"><?php esc_html_e( 'Бесплатная доставка до двери', 'sneakmax' ); ?></li>
              <li class="modal-note__item"><?php esc_html_e( 'Оплата заказа при получении', 'sneakmax' ); ?></li>
              <li class="modal-note__item"><?php esc_html_e( 'Обмен в течении двух недель', 'sneakmax' ); ?></li>
            </ul>
          </div>
        </div>
        <div class="prod-modal__bottom prod-bottom">
          <div class="prod-bottom__column">
            <h3 class="prod-bottom__title"><?php esc_html_e( 'Описание', 'sneakmax' ); ?></h3>
            <p class="prod-bottom__descr modal-prod-descr"></p>
          </div>
          <div class="prod-bottom__column">
            <h3 class="prod-bottom__title"><?php esc_html_e( 'Характеристики', 'sneakmax' ); ?></h3>
            <div class="prod-chars modal-prod-chars"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sneakmax Cart Modal -->
    <div
      class="modal__container cart-modal"
      role="dialog"
      aria-modal="true"
      aria-labelledby="cartModalTitle"
      data-graph-target="cart-modal"
    >
      <button
        class="btn-reset modal__close"
        aria-label="<?php esc_attr_e( 'Закрыть модальное окно', 'sneakmax' ); ?>"
      ></button>
      <div class="modal-content">
        <div class="cart-modal__top">
          <h2 class="cart-modal__title" id="cartModalTitle"><?php esc_html_e( 'Оформление заказа', 'sneakmax' ); ?></h2>
          <span class="cart-modal__order-number"><?php esc_html_e( 'Быстрое подтверждение', 'sneakmax' ); ?></span>
        </div>
        <div class="cart-modal-order">
          <div class="cart-modal-order__top">
            <div class="span cart-modal-order__quantity">
              <?php esc_html_e( 'Товаров в заказе:', 'sneakmax' ); ?> <span>0 шт</span>
            </div>
            <div class="span cart-modal-order__summ">
              <?php esc_html_e( 'Общая сумма заказа:', 'sneakmax' ); ?> <span>0 р</span>
            </div>
          </div>
          <div class="cart-modal-order__content">
            <button class="btn-reset cart-modal-order__show" type="button">
              <?php esc_html_e( 'Состав заказа', 'sneakmax' ); ?>
              <svg width="12" height="8" viewBox="0 0 12 8" fill="none" stroke="currentColor">
                <path d="M1 1l5 5 5-5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <ul class="cart-modal-order__list list-reset"></ul>
          </div>
        </div>
        <form class="cart-modal__form">
          <input
            type="text"
            class="input cart-modal__input"
            name="name"
            placeholder="<?php esc_attr_e( 'Ваше имя', 'sneakmax' ); ?>"
            aria-label="<?php esc_attr_e( 'Ваше имя', 'sneakmax' ); ?>"
            data-validate-field="name"
            required
          />
          <input
            type="tel"
            class="input cart-modal__input"
            name="tel"
            placeholder="<?php esc_attr_e( 'Номер телефона', 'sneakmax' ); ?>"
            aria-label="<?php esc_attr_e( 'Номер телефона', 'sneakmax' ); ?>"
            data-validate-field="phone"
            required
          />
          <input
            type="email"
            class="input cart-modal__input"
            name="email"
            placeholder="E-mail"
            aria-label="<?php esc_attr_e( 'Ваш e-mail', 'sneakmax' ); ?>"
            data-validate-field="email"
            required
          />
          <button type="submit" class="btn-reset btn btn--primary cart-modal__btn">
            <?php esc_html_e( 'Оформить заказ', 'sneakmax' ); ?>
          </button>
        </form>
      </div>
    </div>
  </div>

  <button class="back-to-top" id="backToTop" aria-label="<?php esc_attr_e( 'Вернуться наверх', 'sneakmax' ); ?>" title="<?php esc_attr_e( 'Наверх', 'sneakmax' ); ?>">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <path d="M18 15l-6-6-6 6"/>
    </svg>
  </button>
  <div class="toast-msg" id="toastMsg" role="status" aria-live="polite"></div>

</div><!-- /.site-container -->

<script>
window.PRODUCTS_DATA = <?php
$data_file = get_template_directory() . '/data/data.json';
if ( file_exists( $data_file ) ) {
  $products_data = json_decode( file_get_contents( $data_file ), true );
  $theme_uri = esc_url( get_template_directory_uri() );

  $wc_products = function_exists( 'wc_get_products' ) ? wc_get_products( array( 'status' => 'publish', 'limit' => -1 ) ) : array();
  $wc_by_sku = array();
  $wc_by_title = array();
  foreach ( $wc_products as $wc_p ) {
    if ( $wc_p->get_sku() ) {
      $wc_by_sku[ $wc_p->get_sku() ] = $wc_p;
    }
    $wc_by_title[ trim( mb_strtolower( $wc_p->get_name() ) ) ] = $wc_p;
  }

  foreach ( $products_data as &$item ) {
    $sku = 'SNK-' . str_pad( (string) $item['id'], 3, '0', STR_PAD_LEFT );
    $lower_title = trim( mb_strtolower( $item['title'] ) );
    $matched = isset( $wc_by_sku[ $sku ] ) ? $wc_by_sku[ $sku ] : ( isset( $wc_by_title[ $lower_title ] ) ? $wc_by_title[ $lower_title ] : null );

    if ( $matched ) {
      $item['wc_id'] = $matched->get_id();
      $item['permalink'] = $matched->get_permalink();
    } else {
      $item['wc_id'] = $item['id'];
    }

    if ( ! empty( $item['mainImage'] ) && strpos( $item['mainImage'], 'http' ) !== 0 ) {
      $item['mainImage'] = $theme_uri . '/' . ltrim( $item['mainImage'], './' );
    }
    if ( ! empty( $item['gallery'] ) && is_array( $item['gallery'] ) ) {
      foreach ( $item['gallery'] as &$g_img ) {
        if ( strpos( $g_img, 'http' ) !== 0 ) {
          $g_img = $theme_uri . '/' . ltrim( $g_img, './' );
        }
      }
    }
  }
  unset( $item );

  echo wp_json_encode( $products_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
} else {
  echo '[]';
}
?>;

document.addEventListener('DOMContentLoaded', function () {
  // Sync modal buy buttons with active modal product
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-graph-path="prod-modal"]');
    if (btn) {
      var pid = btn.dataset.id;
      var card = btn.closest('.product');
      var title = card ? card.querySelector('.product__title a').textContent.trim() : '';
      var price = card ? card.querySelector('.product__price').textContent.trim() : '';
      var img = card ? card.querySelector('.product__image img') : null;

      var addBtn = document.getElementById('modalAddToCartBtn');
      var buyBtn = document.getElementById('modalQuickBuyBtn');
      if (addBtn) addBtn.dataset.product_id = pid;
      if (buyBtn) {
        buyBtn.dataset.product_id = pid;
        buyBtn.dataset.productName = title;
        buyBtn.dataset.productPrice = price;
        if (img) buyBtn.dataset.productThumb = '<img src=\"' + img.src + '\" alt=\"\" />';
      }
    }
  });

  // Modal Add to Cart handler
  var modalAddBtn = document.getElementById('modalAddToCartBtn');
  if (modalAddBtn && window.jQuery) {
    modalAddBtn.addEventListener('click', function (e) {
      e.preventDefault();
      var pid = this.dataset.product_id || 120;
      jQuery.post(sneakmaxData.ajaxUrl, {
        action: 'woocommerce_add_to_cart',
        product_id: pid,
        quantity: 1
      }, function (res) {
        if (res && res.fragments) {
          jQuery(document.body).trigger('added_to_cart', [res.fragments, res.cart_hash, jQuery(modalAddBtn)]);
        }
        if (typeof WFCD_Frontend !== 'undefined') {
          WFCD_Frontend.openDrawer();
        }
      });
    });
  }
});
</script>

<?php wp_footer(); ?>
</body>
</html>
