<?php
/**
* The main template file.
* 
* @package kale
*/
?>
<?php get_header(); ?>

<?php $kale_blog_feed_sidebar_show = kale_get_option('kale_blog_feed_sidebar_show'); ?>

<div class="blog-feed">
	<!-- Two Columns -->
	<div class="row two-columns">
		<?php get_template_part('parts/feed'); ?>
		<?php if($kale_blog_feed_sidebar_show == 1) { get_sidebar(); } ?>
	</div>
	<!-- /Two Columns -->
	<hr />
</div>

<?php get_footer(); ?>