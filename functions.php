<?php
/**
 * Sneakmax functions and definitions
 *
 * @package Sneakmax
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SNEAKMAX_VERSION', '1.0.3' );

/**
 * Theme setup
 */
function sneakmax_setup() {
	load_theme_textdomain( 'sneakmax', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Главное меню', 'sneakmax' ),
			'footer'  => esc_html__( 'Меню в футере', 'sneakmax' ),
		)
	);
}
add_action( 'after_setup_theme', 'sneakmax_setup' );

/**
 * Declare HPOS compatibility
 */
add_action( 'before_woocommerce_init', function() {
	if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );

/**
 * Enqueue scripts and styles
 */
function sneakmax_scripts() {
	$theme_uri = get_template_directory_uri();

	wp_enqueue_style( 'sneakmax-style-bundle', $theme_uri . '/css/style.min.css', array(), SNEAKMAX_VERSION );
	wp_enqueue_style( 'sneakmax-theme-style', get_stylesheet_uri(), array( 'sneakmax-style-bundle' ), SNEAKMAX_VERSION );

	wp_enqueue_script( 'sneakmax-vendor', $theme_uri . '/js/vendor.min.js', array( 'jquery' ), SNEAKMAX_VERSION, true );
	wp_enqueue_script( 'sneakmax-main', $theme_uri . '/js/main.js', array( 'sneakmax-vendor' ), SNEAKMAX_VERSION, true );

	wp_localize_script(
		'sneakmax-main',
		'sneakmaxData',
		array(
			'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
			'nonce'     => wp_create_nonce( 'sneakmax_ajax_nonce' ),
			'cartUrl'   => function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : '',
			'currency'  => function_exists( 'get_woocommerce_currency_symbol' ) ? get_woocommerce_currency_symbol() : '₽',
			'themeUri'  => get_template_directory_uri(),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'sneakmax_scripts' );

/**
 * AJAX Fragments for Header Cart Count
 */
function sneakmax_cart_count_fragment( $fragments ) {
	if ( function_exists( 'WC' ) && WC()->cart ) {
		$count = WC()->cart->get_cart_contents_count();
		$fragments['.cart__count'] = '<span class="cart__count">' . esc_html( $count ) . '</span>';
	}
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'sneakmax_cart_count_fragment' );

/**
 * AJAX Catalog Filter Handler
 */
function sneakmax_ajax_filter_products() {
	check_ajax_referer( 'sneakmax_ajax_nonce', 'nonce' );

	$min_price = isset( $_POST['min_price'] ) ? floatval( $_POST['min_price'] ) : 0;
	$max_price = isset( $_POST['max_price'] ) ? floatval( $_POST['max_price'] ) : 100000;
	$gender    = isset( $_POST['gender'] ) ? sanitize_text_field( wp_unslash( $_POST['gender'] ) ) : '';
	$size      = isset( $_POST['size'] ) ? sanitize_text_field( wp_unslash( $_POST['size'] ) ) : '';
	$paged     = isset( $_POST['paged'] ) ? max( 1, intval( $_POST['paged'] ) ) : 1;
	$per_page  = isset( $_POST['per_page'] ) ? intval( $_POST['per_page'] ) : 9;

	$args = array(
		'status'   => 'publish',
		'limit'    => $per_page,
		'page'     => $paged,
		'paginate' => true,
	);

	if ( $min_price > 0 || $max_price < 100000 ) {
		$args['min_price'] = $min_price;
		$args['max_price'] = $max_price;
	}

	$results = function_exists( 'wc_get_products' ) ? wc_get_products( $args ) : (object) array( 'products' => array(), 'total' => 0 );

	ob_start();
	if ( ! empty( $results->products ) ) {
		foreach ( $results->products as $product ) {
			sneakmax_render_product_card( $product );
		}
	} else {
		echo '<p class="catalog__empty">' . esc_html__( 'Товары не найдены по выбранным критериям.', 'sneakmax' ) . '</p>';
	}
	$html = ob_get_clean();

	wp_send_json_success(
		array(
			'html'       => $html,
			'total'      => $results->total,
			'max_pages'  => $results->max_num_pages,
			'page'       => $paged,
			'count_text' => sprintf( esc_html__( 'В наличии %d моделей', 'sneakmax' ), $results->total ),
		)
	);
}
add_action( 'wp_ajax_sneakmax_filter_products', 'sneakmax_ajax_filter_products' );
add_action( 'wp_ajax_nopriv_sneakmax_filter_products', 'sneakmax_ajax_filter_products' );

/**
 * AJAX Quick View Handler
 */
function sneakmax_ajax_quick_view() {
	check_ajax_referer( 'sneakmax_ajax_nonce', 'nonce' );

	$product_id = isset( $_POST['product_id'] ) ? intval( $_POST['product_id'] ) : 0;
	if ( ! $product_id ) {
		wp_send_json_error( array( 'message' => 'Invalid product ID' ) );
	}

	$product = wc_get_product( $product_id );
	if ( ! $product ) {
		wp_send_json_error( array( 'message' => 'Product not found' ) );
	}

	$image_id = $product->get_image_id();
	$gallery_ids = $product->get_gallery_image_ids();
	$images = array();

	if ( $image_id ) {
		$images[] = wp_get_attachment_image_url( $image_id, 'large' );
	}
	foreach ( $gallery_ids as $gid ) {
		$images[] = wp_get_attachment_image_url( $gid, 'large' );
	}
	if ( empty( $images ) ) {
		$images[] = wc_placeholder_img_src();
	}

	$sizes_attr = $product->get_attribute( 'pa_size' );
	$sizes = $sizes_attr ? array_map( 'trim', explode( ',', $sizes_attr ) ) : array( '39', '40', '41', '42', '43' );

	$chars = array(
		'Артикул' => $product->get_sku() ? $product->get_sku() : 'SNK-' . $product->get_id(),
		'Пол'     => $product->get_attribute( 'gender' ) ? $product->get_attribute( 'gender' ) : 'Унисекс',
		'Цвета'   => $product->get_attribute( 'color' ) ? $product->get_attribute( 'color' ) : 'Мультиколор',
		'Страна'  => $product->get_attribute( 'country' ) ? $product->get_attribute( 'country' ) : 'Вьетнам',
		'Состав'  => $product->get_attribute( 'material' ) ? $product->get_attribute( 'material' ) : 'Натуральная кожа, текстиль',
	);

	wp_send_json_success(
		array(
			'id'          => $product->get_id(),
			'title'       => $product->get_name(),
			'price'       => number_format( (float) $product->get_price(), 0, '', ' ' ),
			'oldPrice'    => $product->is_on_sale() ? number_format( (float) $product->get_regular_price(), 0, '', ' ' ) : null,
			'images'      => $images,
			'sizes'       => $sizes,
			'description' => wp_strip_all_tags( $product->get_description() ? $product->get_description() : $product->get_short_description() ),
			'chars'       => $chars,
			'add_to_cart_url' => $product->add_to_cart_url(),
		)
	);
}
add_action( 'wp_ajax_sneakmax_quick_view', 'sneakmax_ajax_quick_view' );
add_action( 'wp_ajax_nopriv_sneakmax_quick_view', 'sneakmax_ajax_quick_view' );

/**
 * Render Sneakmax Product Card HTML
 */
function sneakmax_render_product_card( $product ) {
	if ( is_numeric( $product ) ) {
		$product = wc_get_product( $product );
	}
	if ( ! $product ) {
		return;
	}

	$pid           = $product->get_id();
	$title         = $product->get_name();
	$price         = $product->get_price();
	$regular_price = $product->get_regular_price();
	$on_sale       = $product->is_on_sale();
	$image_url     = wp_get_attachment_image_url( $product->get_image_id(), 'medium' );
	if ( ! $image_url ) {
		$image_url = get_template_directory_uri() . '/data/images/1/1.webp';
	}
	$sprite_url    = get_template_directory_uri() . '/img/sprite.svg';
	?>
	<li class="catalog-list__item" data-id="<?php echo esc_attr( $pid ); ?>">
		<article class="product">
			<?php if ( $on_sale ) : ?>
				<div class="product__badges">
					<span class="badge-sale"><?php esc_html_e( 'Скидка', 'sneakmax' ); ?></span>
				</div>
			<?php endif; ?>

			<div class="product__image">
				<img
					src="<?php echo esc_url( $image_url ); ?>"
					alt="<?php echo esc_attr( $title ); ?>"
					width="280"
					height="293"
					loading="lazy"
				/>
				<div class="product__btns">
					<button
						class="btn-reset product__btn product__btn--view"
						data-graph-path="prod-modal"
						data-id="<?php echo esc_attr( $pid ); ?>"
						data-tooltip="<?php esc_attr_e( 'Просмотр', 'sneakmax' ); ?>"
						aria-label="<?php echo esc_attr( sprintf( __( 'Показать информацию о товаре %s', 'sneakmax' ), $title ) ); ?>"
						title="<?php esc_attr_e( 'Быстрый просмотр', 'sneakmax' ); ?>"
					>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
							<circle cx="12" cy="12" r="3"></circle>
						</svg>
					</button>

					<button
						class="btn-reset product__btn product__btn--cart add-to-cart-btn ajax_add_to_cart add_to_cart_button"
						data-id="<?php echo esc_attr( $pid ); ?>"
						data-product_id="<?php echo esc_attr( $pid ); ?>"
						data-quantity="1"
						data-tooltip="<?php esc_attr_e( 'В корзину', 'sneakmax' ); ?>"
						aria-label="<?php echo esc_attr( sprintf( __( 'Добавить в корзину: %s', 'sneakmax' ), $title ) ); ?>"
						title="<?php esc_attr_e( 'В корзину', 'sneakmax' ); ?>"
					>
						<svg width="19" height="18" viewBox="0 0 20 19" fill="currentColor">
							<path d="M20 6.579h-3.396L13.036.319a.608.608 0 00-.858-.225.678.678 0 00-.214.902l3.182 5.583H4.854L8.036.996a.678.678 0 00-.214-.902.608.608 0 00-.858.225L3.396 6.58H0v1.316h1.357l1.587 8.915c.166.934.941 1.611 1.844 1.611h10.424c.902 0 1.678-.677 1.843-1.61l1.588-8.916H20V6.579zm-4.174 9.99a.634.634 0 01-.614.536H4.788c-.301 0-.56-.225-.615-.537L2.628 7.895h14.744l-1.546 8.674z"/>
						</svg>
					</button>

					<button
						class="btn-reset product__btn product__btn--quick wfcd-quick-buy-btn"
						data-product_id="<?php echo esc_attr( $pid ); ?>"
						data-product-name="<?php echo esc_attr( $title ); ?>"
						data-product-price="<?php echo esc_attr( number_format( (float) $price, 0, '', ' ' ) . ' ₽' ); ?>"
						data-product-thumb="<?php echo esc_attr( '<img src="' . esc_url( $image_url ) . '" alt="" />' ); ?>"
						data-tooltip="<?php esc_attr_e( 'В 1 клик', 'sneakmax' ); ?>"
						aria-label="<?php echo esc_attr( sprintf( __( 'Купить в 1 клик: %s', 'sneakmax' ), $title ) ); ?>"
						title="<?php esc_attr_e( 'Купить в 1 клик', 'sneakmax' ); ?>"
					>
						<svg width="19" height="19" viewBox="0 0 24 24" fill="currentColor">
							<path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
						</svg>
					</button>
				</div>
			</div>

			<h3 class="product__title">
				<a href="<?php echo esc_url( get_permalink( $pid ) ); ?>">
					<?php echo esc_html( $title ); ?>
				</a>
			</h3>

			<div class="product__price-wrap" style="display: flex; align-items: baseline; gap: 8px;">
				<span class="product__price"><?php echo esc_html( number_format( (float) $price, 0, '', ' ' ) ); ?> р</span>
				<?php if ( $on_sale && $regular_price ) : ?>
					<span class="product__price-old" style="text-decoration: line-through; color: #8e8e8e; font-size: 13px;">
						<?php echo esc_html( number_format( (float) $regular_price, 0, '', ' ' ) ); ?> р
					</span>
				<?php endif; ?>
			</div>
		</article>
	</li>
	<?php
}
