<?php
/**
 * Template Name: Full Width
 *
 * The template for displaying a full width page
 *
 * @package kale
 */
?>
<?php get_header(); ?>

<?php $kale_pages_featured_image_show = kale_get_option('kale_pages_featured_image_show'); ?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- /Full Width -->
<div class="row full-width">
    <!-- Main Column -->
    <div class="main-column col-md-12">
        
        <!-- Page Content -->
        <div id="page-<?php the_ID(); ?>" <?php post_class('entry entry-page entry-page-full'); ?>>
            
            <?php 
            if($kale_pages_featured_image_show == 1) { 
                if(has_post_thumbnail()) { ?>
                <div class="entry-thumb"><?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></div><?php } 
            } ?>
            
            <!-- Jetpack Sharing -->
            <div class="<?php if($kale_override_jetpack_share_styling == 1) { ?>entry-share<?php } else { ?>entry-share-default<?php } ?>">
                <?php 
                if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); }
                if ( class_exists( 'Jetpack_Likes' ) ) {
                    $custom_likes = new Jetpack_Likes;
                    echo $custom_likes->post_likes( '' );
                }
                ?>
            </div>
            <div class="clearfix"></div>
            <!-- /Jetpack Sharing -->
            
            
            <?php $title = get_the_title(); ?>
            <?php if($title == '') { ?>
            <h1 class="entry-title"><?php _e('Page ID: ', 'kale'); the_ID(); ?></h1>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>
            <div class="page-content"><?php the_content(); ?></div>
        </div>
        <!-- /Page Content -->

        <?php if ( is_active_sidebar( 'page-ad' ) ) { dynamic_sidebar( 'page-ad' ); } ?>
        
        <!-- Page Comments -->
        <?php if ( comments_open() ) : ?>
        <hr />
        <?php comments_template(); ?>
        <?php endif; ?>  
        <!-- /Page Comments -->  
        
    </div>
    <!-- /Main Column -->

</div>
<!-- /Full Width -->

<?php endwhile; ?>
<hr />

<?php get_footer(); ?>