<?php
/**
 * The template for displaying posts
 *
 * @package kale
 */
?>
<?php get_header(); ?>

<?php
$kale_posts_meta_show = kale_get_option('kale_posts_meta_show');
$kale_posts_date_show = kale_get_option('kale_posts_date_show');
$kale_posts_category_show = kale_get_option('kale_posts_category_show');
$kale_posts_author_show = kale_get_option('kale_posts_author_show');
$kale_posts_tags_show = kale_get_option('kale_posts_tags_show');
$kale_posts_sidebar = kale_get_option('kale_posts_sidebar');
$kale_posts_featured_image_show = kale_get_option('kale_posts_featured_image_show');
$kale_sidebar_size = kale_get_option('kale_sidebar_size');

$kale_posts_share_top_show = kale_get_option('kale_posts_share_top_show');
$kale_posts_share_bottom_show = kale_get_option('kale_posts_share_bottom_show');

$kale_posts_posts_nav_show = kale_get_option('kale_posts_posts_nav_show');
$kale_posts_related_show = kale_get_option('kale_posts_related_show');

$kale_override_jetpack_share_styling = kale_get_option('kale_override_jetpack_share_styling');

$show_video = false;
if(get_post_format() == 'video') { 
    $kale_post_meta = get_post_meta(get_the_ID(),'_video_post_meta', TRUE);
    if(is_array($kale_post_meta)) if(array_key_exists ('youtube_link', $kale_post_meta)) { $show_video = true; } 
} 
?>
<?php while ( have_posts() ) : the_post(); ?>

<?php
$kale_jump_to_recipe_link = '';
$the_content = get_the_content();
if ( has_shortcode( $the_content, 'lt_recipe' ) ) { 
    $kale_jump_to_recipe_link_show = kale_get_option('kale_jump_to_recipe_link_show');
    if($kale_jump_to_recipe_link_show == 1){
        $kale_jump_to_recipe_link_label = kale_get_option('kale_jump_to_recipe_link_label');
        $kale_jump_to_recipe_link = '<div class="jump-to-recipe"><a href="#lt-recipe">' . $kale_jump_to_recipe_link_label . '</a></div>';
    }
}
?>
<!-- Two Columns -->
<div class="row two-columns">

    <!-- Main Column -->
    <?php if($kale_posts_sidebar == 1) { ?>
    <div class="main-column <?php if($kale_sidebar_size == 0) { ?> col-md-8 <?php } else { ?> col-md-9 <?php } ?>">
    <?php } else { ?>
    <div class="main-column col-md-12">
    <?php } ?>
    
        <!-- Post Content -->
        <div id="post-<?php the_ID(); ?>" <?php post_class('entry entry-post'); ?>>
            
            <div class="entry-header">
				<?php if($kale_posts_meta_show == 1 && $kale_posts_date_show == 1) { ?>
                <div class="entry-meta">
                    <div class="entry-date date updated"><?php the_date(); ?></div>
                </div>
				<?php } ?>
                
                <!-- Jetpack Sharing -->
				<?php if($kale_posts_share_top_show == 1) { ?>
				<div class="<?php if($kale_override_jetpack_share_styling == 1) { ?>entry-share<?php } else { ?>entry-share-default<?php } ?>">
					<?php 
					if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); }
					if ( class_exists( 'Jetpack_Likes' ) ) {
						$custom_likes = new Jetpack_Likes;
						echo $custom_likes->post_likes( '' );
					}
					?>
				</div>
				<?php } ?>
				<div class="clearfix"></div>
                <!-- /Jetpack Sharing -->
                
            </div>
            
            <?php $title = get_the_title(); ?>
            <?php if($title == '') { ?>
            <h1 class="entry-title"><?php _e('Post ID: ', 'kale'); the_ID(); ?></h1>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>
            
            <?php echo $kale_jump_to_recipe_link; ?>
            
            <?php 
            if($kale_posts_featured_image_show == 1 && !$show_video) { 
                if(has_post_thumbnail()) { ?>
                <div class="entry-thumb"><?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></div><?php } 
            } ?>
            
            <div class="entry-content">
                <?php if($show_video) { ?>
                    <div class="iframe-video"><iframe width="100%" height="315" src="<?php echo esc_url($kale_post_meta['youtube_link']); ?>" frameborder="0" allowfullscreen></iframe></div><br />
                <?php } ?>
                <div class="single-content"><?php the_content(); wp_link_pages(); ?></div>
            </div>
            
            <?php if(  ( $kale_posts_meta_show == 1 && ($kale_posts_category_show == 1 || $kale_posts_tags_show == 1 || $kale_posts_author_show == 1) ) || $kale_posts_share_bottom_show == 1  ) { ?>
            <div class="entry-footer">
                <?php if( $kale_posts_meta_show == 1 && ($kale_posts_category_show == 1 || $kale_posts_tags_show == 1 || $kale_posts_author_show == 1) ){ ?>
                <div class="entry-meta">
                    <?php if($kale_posts_author_show == 1) { ?><div class="entry-author"><span><?php esc_html_e('Author: ', 'kale'); ?></span><span class="vcard author author_name"><span class="fn">Suzanne Costa<?php //the_author_posts_link(); ?></span></span></div><?php } ?>
					<?php if($kale_posts_category_show == 1 && has_category()) { ?><div class="entry-category"><span><?php _e('Filed Under: ', 'kale'); ?></span><?php the_category(', '); ?></div><?php } ?>
                    <?php if($kale_posts_tags_show == 1 && has_tag()) { ?><div class="entry-tags"><span><?php _e('Tags: ', 'kale'); ?></span><?php the_tags('',', '); ?></div><?php } ?>
                </div>
                <?php } ?>
                
                <!-- Jetpack Sharing -->
                <?php if($kale_posts_share_bottom_show == 1) { ?>
                <div class="<?php if($kale_override_jetpack_share_styling == 1) { ?>entry-share<?php } else { ?>entry-share-default<?php } ?>">
                    <?php 
                    if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); }
                    if ( class_exists( 'Jetpack_Likes' ) ) {
                        $custom_likes = new Jetpack_Likes;
                        echo $custom_likes->post_likes( '' );
                    }
                    ?>
                </div>
                <?php } ?>
                <!-- /Jetpack Sharing -->
                
            </div>
            <?php } ?>
        
        </div>
        <!-- /Post Content -->
        
        <?php if ( is_active_sidebar( 'post-ad1' ) ) { dynamic_sidebar( 'post-ad1' ); } ?>
        
        <?php 
        if($kale_posts_related_show == 1) { 
            $kale_related_posts = kale_get_related_posts(get_the_ID(), 2); 
            if(count($kale_related_posts)==2) { $orig_post = $post;?>
            <!-- Related Posts -->
            <hr />
            <div class="entry-related-posts">
                <h4><?php _e('Related Posts', 'kale'); ?></h4>
                <div class="row">
                <?php foreach($kale_related_posts as $related_post) {
                    $post = get_post($related_post); 
                    setup_postdata($post); 
                    $kale_entry = 'small';
                    ?><div class="col-md-6"><?php include(locate_template('parts/entry.php')); ?></div><?php
                    wp_reset_postdata(); 
                }
                ?></div>
            </div>
        <!-- /Related Posts -->
        <?php $post = $orig_post; } }?>
        
        <?php if($kale_posts_posts_nav_show == 1) { ?>
        <hr />
        <div class="pagination-post">
            <div class="previous_post"><?php previous_post_link('%link','%title',true); ?></div>
            <div class="next_post"><?php next_post_link('%link','%title',true); ?></div>
        </div>
        <?php } ?>
        
        <!-- Post Comments -->
        <?php if ( comments_open() ) : ?>
        <hr />
        <?php comments_template(); ?>
        <?php endif; ?>  
        <!-- /Post Comments -->
        
    </div>
    <!-- /Main Column -->
    
    
    <?php if($kale_posts_sidebar == 1)  { get_sidebar(); } ?>
    
</div>
<!-- /Two Columns -->
        
<?php endwhile; ?>
<hr />

<?php get_footer(); ?>