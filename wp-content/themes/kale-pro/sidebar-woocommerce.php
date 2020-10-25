<!-- WooCommerce Sidebar -->
<div class="sidebar-column col-md-3">
    
    <?php 
    
	if ( class_exists( 'WooCommerce' ) ) {
		
		if(is_shop()){
			if(is_active_sidebar('sidebar-woocommerce-bordered')) { ?><div class="sidebar-woocommerce-borders sidebar-block sidebar-borders"><?php dynamic_sidebar('sidebar-woocommerce-bordered'); ?></div><?php } 
			if(is_active_sidebar('sidebar-woocommerce')) { ?><div class="sidebar-woocommerce sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-woocommerce'); ?></div><?php } 
		}
		if(is_product()){
			if(is_active_sidebar('sidebar-woocommerce-product')) { ?><div class="sidebar-woocommerce sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-woocommerce-product'); ?></div><?php } 
		}
		if(is_product_category()){
			if(is_active_sidebar('sidebar-woocommerce-product-category')) { ?><div class="sidebar-woocommerce sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-woocommerce-product-category'); ?></div><?php } 
		}
		if(is_cart()){
			if(is_active_sidebar('sidebar-woocommerce-cart')) { ?><div class="sidebar-woocommerce sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-woocommerce-cart'); ?></div><?php } 
		}
		if(is_checkout()){
			if(is_active_sidebar('sidebar-woocommerce-checkout')) { ?><div class="sidebar-woocommerce sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-woocommerce-checkout'); ?></div><?php } 
		}
		
	}
	
    ?>
    
</div>
<!-- /Sidebar -->