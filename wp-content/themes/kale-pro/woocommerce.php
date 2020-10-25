<?php
/**
 * The template for displaying WooCommerce pages
 *
 * @package kale
 */
?>
<?php get_header(); ?>

<?php 
// 0 = full width, 1 = right
$kale_woocommerce_sidebar = kale_get_option('kale_woocommerce_sidebar'); 
?>

<?php if($kale_woocommerce_sidebar == 1 && kale_is_active_woocommerce_sidebar()) { ?>
	<div class="row two-columns sidebar-right"><div class="main-column col-md-9">
<?php } else { ?>
	<div class="row one-column sidebar-none"><div class="main-column col-md-12">
<?php } ?>
            
        <!-- Page Content -->
        <div id="page-<?php the_ID(); ?>" <?php post_class('entry entry-page page-woocommerce'); ?>>
            <?php do_action( 'woocommerce_before_main_content' ); ?>

            <?php woocommerce_content(); ?>

            <?php do_action( 'woocommerce_after_main_content' ); ?>
        </div>
        <!-- /Page Content -->
        
    </div>
    <!-- /Main Column -->

    <?php if($kale_woocommerce_sidebar == 1 && kale_is_active_woocommerce_sidebar()) { get_sidebar('woocommerce'); }?>

</div>
<!-- /One or Two Columns -->


<?php get_footer(); ?>