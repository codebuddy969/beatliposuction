<?php
/**
 * Frontpage - Featured Posts
 *
 * @package kale
 */
?>
<?php 
$kale_frontpage_featured_posts_show = kale_get_option('kale_frontpage_featured_posts_show');
if($kale_frontpage_featured_posts_show == 1) { 
    global $post;
    $kale_frontpage_featured_posts_heading = kale_get_option('kale_frontpage_featured_posts_heading');
	$kale_frontpage_featured_posts_type = kale_get_option('kale_frontpage_featured_posts_type');
    $kale_frontpage_featured_posts_post_1 = kale_get_option('kale_frontpage_featured_posts_post_1');
    $kale_frontpage_featured_posts_post_2 = kale_get_option('kale_frontpage_featured_posts_post_2');
    $kale_frontpage_featured_posts_post_3 = kale_get_option('kale_frontpage_featured_posts_post_3'); 
	$kale_frontpage_featured_posts_page_1 = kale_get_option('kale_frontpage_featured_posts_page_1');
    $kale_frontpage_featured_posts_page_2 = kale_get_option('kale_frontpage_featured_posts_page_2');
    $kale_frontpage_featured_posts_page_3 = kale_get_option('kale_frontpage_featured_posts_page_3');
	if($kale_frontpage_featured_posts_type == 'Posts'){
		$kale_featured_item_1 = $kale_frontpage_featured_posts_post_1;
		$kale_featured_item_2 = $kale_frontpage_featured_posts_post_2;
		$kale_featured_item_3 = $kale_frontpage_featured_posts_post_3;
		$element_type = 'post';
	} else {
		$kale_featured_item_1 = $kale_frontpage_featured_posts_page_1;
		$kale_featured_item_2 = $kale_frontpage_featured_posts_page_2;
		$kale_featured_item_3 = $kale_frontpage_featured_posts_page_3;
		$element_type = 'page';
	}
    $kale_entry = 'small'; ?>
    <!-- Frontpage Featured Posts -->
    <div class="frontpage-featured-posts">
        <h2 class="block-title"><span><?php echo esc_html($kale_frontpage_featured_posts_heading); ?></span></h2>
        <div class="row" data-fluid=".entry-title">
            <div class="col-md-4">
                <?php 
                if(has_filter('wpml_object_id')) $post = get_post( apply_filters( 'wpml_object_id', $kale_featured_item_1, $element_type, TRUE ) );
                else $post = get_post($kale_featured_item_1); 
                setup_postdata($post); 
                include(locate_template('parts/entry.php'));
                wp_reset_postdata(); 
                ?>
            </div>
            <div class="col-md-4">
                <?php 
                if(has_filter('wpml_object_id')) $post = get_post( apply_filters( 'wpml_object_id', $kale_featured_item_2, $element_type, TRUE ) );
                else $post = get_post($kale_featured_item_2); 
                setup_postdata($post); 
                include(locate_template('parts/entry.php'));
                wp_reset_postdata(); 
                ?>
            </div>
            <div class="col-md-4">
                <?php 
                if(has_filter('wpml_object_id')) $post = get_post( apply_filters( 'wpml_object_id', $kale_featured_item_3, $element_type, TRUE ) );
                else $post = get_post($kale_featured_item_3); 
                setup_postdata($post); 
                include(locate_template('parts/entry.php'));
                wp_reset_postdata(); 
                ?>
            </div>
        </div>
		<hr />
    </div>
    <!-- /Frontpage Featured Posts -->
<?php } ?>