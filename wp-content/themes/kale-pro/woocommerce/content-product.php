<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

if( is_shop()|| is_product_category() || is_product_tag() ) {
	$current_post = $wp_query->current_post;
	if($current_post % 4 == 0) {
		$row_open = '<div class="row">';
		$row_close = '';
	} else if ( ($current_post+1) % 4 == 0 ){
		$row_open = '';
		$row_close = '</div>';
	} else {
		$row_open = '';
        $row_close = '';
    }
	if($wp_query->post_count == ($current_post)+1){
		$row_close = '</div>';
	}
    $block_class = 'col-sm-6 col-md-3';
} else {
    $row_open = '';
    $row_close = '';
    $block_class = 'kale-product-slick-item';
}
?>
<?php echo $row_open; ?>
<div class="<?php echo $block_class; ?>">
    <div <?php post_class('kale-loop-product'); ?>>
        <?php
        /**
         * woocommerce_before_shop_loop_item hook.
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         * @hooked kale_template_loop_product_thumb - 10
         */
        do_action( 'woocommerce_before_shop_loop_item' );

        /**
         * woocommerce_before_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_add_to_cart - 10
         * @hooked kale_template_loop_product_thumb_close - 10
         */
        do_action( 'woocommerce_before_shop_loop_item_title' );

        /**
         * woocommerce_shop_loop_item_title hook.
         *
         * @hooked kale_template_loop_product_title - 10
         */
        do_action( 'woocommerce_shop_loop_item_title' );

        /**
         * woocommerce_after_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_price - 10
         */
        do_action( 'woocommerce_after_shop_loop_item_title' );

        /**
         * woocommerce_after_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_rating - 10
         */
        do_action( 'woocommerce_after_shop_loop_item' );
        ?>
    </div>
</div>
<?php echo $row_close; ?>