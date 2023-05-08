<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package rspl_base
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function rspl_theme_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			// 'thumbnail_image_width' => 210,
		// 	'single_image_width'    => 300,
		// 	'product_grid'          => array(
		// 		'default_rows'    => 3,
		// 		'min_rows'        => 1,
				'default_columns' => 0,
		// 		'min_columns'     => 1,
		// 		'max_columns'     => 6,
			),
		// )
	);
	// add_theme_support( 'wc-product-gallery-zoom' );
	// add_theme_support( 'wc-product-gallery-lightbox' );
	// add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'rspl_theme_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function rspl_theme_woocommerce_scripts() {
	wp_enqueue_style( 'rspl_theme-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), RSPL_THEME_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'rspl_theme-woocommerce-style', $inline_font );
}
// add_action( 'wp_enqueue_scripts', 'rspl_theme_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function rspl_theme_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'rspl_theme_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function rspl_theme_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
// add_filter( 'woocommerce_output_related_products_args', 'rspl_theme_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

if ( ! function_exists( 'rspl_theme_woocommerce_template_loop_product_before_thumbnail' ) ) {
	/**
	 * Before Image.
	 *
	 * @return void
	 */
	function rspl_theme_woocommerce_template_loop_product_before_thumbnail() {
		?>
			<div class="post-thumbnail">
		<?php
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'rspl_theme_woocommerce_template_loop_product_before_thumbnail', 9 );

if ( ! function_exists( 'rspl_theme_woocommerce_template_loop_product_after_thumbnail' ) ) {
	/**
	 * After Content.
	 *
	 * @return void
	 */
	function rspl_theme_woocommerce_template_loop_product_after_thumbnail() {
		?>
			</div><!-- .post-thumbnail -->
		<?php
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'rspl_theme_woocommerce_template_loop_product_after_thumbnail', 11 );

if ( ! function_exists( 'rspl_theme_template_loop_product_title' ) ) {
	/**
	 * New Title.
	 *
	 * @return void
	 */
	function rspl_theme_template_loop_product_title() {
		if ( is_shop() ) {
			echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'rspl_theme_template_loop_product_title', 10 );

function rspl_theme_change_existing_currency_symbol( $currency_symbol, $currency ) {
	switch( $currency ) {
		case 'QAR': $currency_symbol = 'QAR'; break;
	}
	return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'rspl_theme_change_existing_currency_symbol', 10, 2);

function rspl_theme_add_to_cart_text($text) {
	
	global $product;
	if ( $product->is_type( 'variable' ) ) {
		$text = __( 'customize now', 'rspl_theme' );
	} else {
		$text = __( 'order now', 'rspl_theme' );
	}
	return $text;	
}
add_filter( 'woocommerce_product_add_to_cart_text', 'rspl_theme_add_to_cart_text', 25 );

if ( ! function_exists( 'rspl_theme_woocommerce__breadcrumb' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function rspl_theme_woocommerce__breadcrumb() {
		if ( is_product() ) {
			echo '<div class="container breadcrumb-wrap">';
			dimox_breadcrumbs();
			echo '</div>';
		}		
	}
}
add_action( 'woocommerce_before_main_content', 'rspl_theme_woocommerce__breadcrumb', 20 );
//


if ( ! function_exists( 'rspl_theme_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function rspl_theme_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
//add_action( 'woocommerce_before_main_content', 'rspl_theme_woocommerce_wrapper_before' );

if ( ! function_exists( 'rspl_theme_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function rspl_theme_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
//add_action( 'woocommerce_after_main_content', 'rspl_theme_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'rspl_theme_woocommerce_header_cart' ) ) {
			rspl_theme_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'rspl_theme_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function rspl_theme_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		rspl_theme_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
// add_filter( 'woocommerce_add_to_cart_fragments', 'rspl_theme_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'rspl_theme_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function rspl_theme_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'rspl_theme' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'rspl_theme' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'rspl_theme_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function rspl_theme_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php rspl_theme_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
