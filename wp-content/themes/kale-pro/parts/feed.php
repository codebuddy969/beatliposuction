<?php
/**
 * The loop / blog feed
 *
 * @package kale
 */
?>
<?php
$kale_blog_feed_meta_show = kale_get_option('kale_blog_feed_meta_show');
$kale_blog_feed_date_show = kale_get_option('kale_blog_feed_date_show');
$kale_blog_feed_category_show = kale_get_option('kale_blog_feed_category_show');
$kale_blog_feed_author_show = kale_get_option('kale_blog_feed_author_show');
$kale_blog_feed_comments_show = kale_get_option('kale_blog_feed_comments_show');
$kale_blog_feed_post_format = kale_get_option('kale_blog_feed_post_format');
$kale_sidebar_size = kale_get_option('kale_sidebar_size');
$kale_blog_feed_sidebar_show = kale_get_option('kale_blog_feed_sidebar_show');
?>

<!-- Main Column -->

<?php if($kale_blog_feed_sidebar_show == 1) { ?>

<div class="main-column <?php if($kale_sidebar_size == 0) { ?> col-md-8 <?php } else { ?> col-md-9 <?php } ?>">
    <!-- Blog Feed -->
    <div class="blog-feed blog-feed-sidebar">
        <h2><?php echo get_the_archive_title(); ?></h2>
        
        <div class="blog-feed-posts">
        
        <?php
        $kale_i = 1; $kale_ad = 0; $kale_flag = true; $kale_div_open = 0;
        if ( have_posts() ) { 
            while ( have_posts() ) : the_post(); 
                /*** Mixed:  2 Small Posts, Followed by 1 Full ***/
                if($kale_blog_feed_post_format == 'Mixed') { 
                    if ($kale_i == 1 && $kale_flag) { ?><div class="row" data-fluid=".entry-title"><div class="col-md-6"><?php $kale_entry = 'small'; include(locate_template('parts/entry.php')); $kale_i = 2; $kale_flag = false; ?></div><?php } 
                    if ($kale_i == 2 && $kale_flag) { ?><div class="col-md-6"><?php $kale_entry = 'small'; include(locate_template('parts/entry.php')); $kale_i = 3; $kale_flag = false; ?></div></div><?php include(locate_template('parts/ad.php')); } 
                    if ($kale_i == 3 && $kale_flag) { $kale_entry = 'full'; include(locate_template('parts/entry.php')); $kale_i=1; $kale_flag = false; } 
                } 
                /*** Full: Large Image Top, Full Content Below ***/
                else if($kale_blog_feed_post_format == 'Full') {
                    $kale_entry = 'full'; include(locate_template('parts/entry.php')); 
                    if($kale_i%2 == 0) { include(locate_template('parts/ad.php')); } 
                    $kale_i++;
                } 
                /*** Small: Small Image and Excerpt, 2 in a Row ***/
                else if($kale_blog_feed_post_format == 'Small') {
                    if($kale_i%2 != 0) { $kale_div_open = 1; ?><div class="row"><?php } ?>
                    <div class="col-md-6"><?php $kale_entry = 'small'; include(locate_template('parts/entry.php')); $kale_i++; ?></div>
                    <?php if($kale_i%2 != 0) { ?></div><?php include(locate_template('parts/ad.php')); $kale_div_open = 0;} ?><?php 
                }
                $kale_flag = true;
            endwhile;
            if($kale_i == 2 && $kale_blog_feed_post_format == 'Mixed') { ?></div><?php } else if ($kale_div_open == 1) { ?></div><?php }  
        } else { ?><div class="blog-feed-empty"><p><?php _e('No posts found.', 'kale'); ?></p></div><?php } ?>
        
        </div>
        <?php if(get_next_posts_link() || get_previous_posts_link()) { ?>
        <div class="pagination-blog-feed">
            <?php if( get_next_posts_link() ) { ?><div class="previous_posts"><?php next_posts_link( __('Previous Posts', 'kale') ); ?></div><?php } ?>
            <?php if( get_previous_posts_link() ) { ?><div class="next_posts"><?php previous_posts_link( __('Next Posts', 'kale') ); ?></div><?php } ?>
        </div>
        <?php } ?>
    </div>
    <!-- /Blog Feed -->
</div>

<?php } else { ?>

<div class="main-column col-md-12">
    <!-- Blog Feed -->
    <div class="blog-feed blog-feed-full-width">
        
        <h2 class="block-title"><span><?php echo esc_html(get_the_archive_title()); ?></span></h2>
		
        <div class="blog-feed-posts">
        
        <?php
        $kale_i = 0; $kale_ad = 0; $kale_div_open = 0;
        if ( have_posts() ) { 
            while ( have_posts() ) : the_post(); 
                /*** Small: Small Image and Excerpt, 3 in a Row ***/
                if($kale_i%3 == 0) { $kale_div_open = 1; ?><div class="row"><?php } ?>
                <div class="col-md-4"><?php $kale_entry = 'small'; include(locate_template('parts/entry.php')); $kale_i++; ?></div>
                <?php if($kale_i%3 == 0) { $kale_div_open = 0; ?></div><?php include(locate_template('parts/ad.php')); } ?>
			<?php  
			endwhile;
            if ($kale_div_open == 1) { ?></div><?php }  
        } else { ?><div class="blog-feed-empty"><p><?php _e('No posts found.', 'kale'); ?></p></div><?php } ?>
        
        </div>
        <?php if(get_next_posts_link() || get_previous_posts_link()) { ?>
        <div class="pagination-blog-feed">
            <?php if( get_next_posts_link() ) { ?><div class="previous_posts"><?php next_posts_link( __('Previous Posts', 'kale') ); ?></div><?php } ?>
            <?php if( get_previous_posts_link() ) { ?><div class="next_posts"><?php previous_posts_link( __('Next Posts', 'kale') ); ?></div><?php } ?>
        </div>
        <?php } ?>
    </div>
    <!-- /Blog Feed -->
</div>

<?php } ?>
<!-- /Main Column -->