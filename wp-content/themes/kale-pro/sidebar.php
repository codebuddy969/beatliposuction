<?php
/**
 * Sidebar
 *
 * @package kale
 */
?>

<?php $kale_sidebar_size = kale_get_option('kale_sidebar_size'); ?>

<!-- Sidebar -->

<div class="sidebar sidebar-column <?php if($kale_sidebar_size == 0) { ?> col-md-4 <?php } else { ?> col-md-3 <?php } ?>"> 

	<?php 

	$kale_flag = true;
	
	if ( class_exists( 'WooCommerce' ) ){
		if(is_cart()) {
			if(is_active_sidebar('sidebar-woocommerce-cart')) { ?><div class="sidebar-woocommerce sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-woocommerce-cart'); ?></div><?php } 
			$kale_flag = false;
		}
		if(is_checkout()){
			if(is_active_sidebar('sidebar-woocommerce-checkout')) { ?><div class="sidebar-woocommerce sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-woocommerce-checkout'); ?></div><?php } 
			$kale_flag = false;
		}
	} 
	
	if ($kale_flag) {
		
		if(is_front_page()) { 
			if(is_active_sidebar('sidebar-frontpage-bordered')) { ?><div class="sidebar-frontpage-borders sidebar-block sidebar-borders"><?php dynamic_sidebar('sidebar-frontpage-bordered'); ?></div><?php } 
			if(is_active_sidebar('sidebar-frontpage')) { ?><div class="sidebar-frontpage sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-frontpage'); ?></div><?php } 
		}
		
		if(is_single()) {
			if(is_active_sidebar('sidebar-single-bordered')) { ?><div class="sidebar-single-borders sidebar-block sidebar-borders"><?php dynamic_sidebar('sidebar-single-bordered'); ?></div><?php } 
			if(is_active_sidebar('sidebar-single')) { ?><div class="sidebar-single sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-single'); ?></div><?php } 
		}
		
		if(is_page()) {
			if(is_active_sidebar('sidebar-page-bordered')) { ?><div class="sidebar-page-borders sidebar-block sidebar-borders"><?php dynamic_sidebar('sidebar-page-bordered'); ?></div><?php } 
			if(is_active_sidebar('sidebar-page')) { ?><div class="sidebar-page sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-page'); ?></div><?php } 
		}
		
		if(is_category()) {
			if(is_active_sidebar('sidebar-category-bordered')) { ?><div class="sidebar-category-borders sidebar-block sidebar-borders"><?php dynamic_sidebar('sidebar-category-bordered'); ?></div><?php } 
			if(is_active_sidebar('sidebar-category')) { ?><div class="sidebar-category sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-category'); ?></div><?php } 
		}
    
		if(is_active_sidebar('sidebar-default-bordered')) { ?><div class="sidebar-default-borders sidebar-block sidebar-borders"><?php dynamic_sidebar('sidebar-default-bordered'); ?></div><?php } 
		
		if(is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } ?>
	
	<?php } ?>

</div>

<!-- /Sidebar -->
