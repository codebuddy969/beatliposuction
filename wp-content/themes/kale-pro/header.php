<?php
/**
 * The Header for the theme.
 *
 * Displays all of the <head> section and logo, navigation, header widgets
 *
 * @package kale
 */
?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119804199-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-119804199-1');
        </script>

    </head>

<body <?php body_class(); ?>>

<div class="main-wrapper">

    <div class="container">

    <!-- Header -->
    <div class="header">

        <?php if ( is_active_sidebar('header-row-1-left') || is_active_sidebar('header-row-1-right') ) { ?>
            <!-- Header Row 1 -->
            <div class="header-row-1">
                <div class="row">

                    <!-- Widget / Social Menu -->
                    <div class="col-sm-6 header-row-1-left">
                        <?php if ( is_active_sidebar( 'header-row-1-left' ) ) { ?><?php dynamic_sidebar( 'header-row-1-left' ); ?><?php } ?>
                    </div>
                    <!-- /Widget / Social Menu -->

                    <!-- Widget / Top Menu -->
                    <div class="col-sm-6 header-row-1-right">
                        <?php if ( is_active_sidebar( 'header-row-1-right' ) ) { ?><?php dynamic_sidebar( 'header-row-1-right' ); ?><?php } ?>
                    </div>
                    <!-- /Widget / Top Menu -->

                </div>
            </div>
            <div class="header-row-1-toggle"><i class="fa fa-angle-down"></i></div>
            <!-- /Header Row 1 -->
        <?php } ?>

        <!-- Header Row 2 -->
        <div class="header-row-2 bp-header-container">
            <div class="bp-header-info">
                <div class="logo">
                    <?php
                    if(kale_get_option('kale_image_logo_show') == 1) {
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();}} else {
                        $kale_text_logo = kale_get_option('kale_text_logo');
                        if($kale_text_logo == '') {
                            $kale_text_logo = get_bloginfo('name');}} ?>
                    <?php if ( is_front_page() ) { ?>
                        <h1 class="header-logo-text">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($kale_text_logo) ?></a>
                        </h1>
                    <?php } else { ?>
                        <div class="header-logo-text">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($kale_text_logo) ?></a>
                        </div>
                    <?php } ?>
                </div>
                <?php if( display_header_text() ) { ?>
                    <p class="bp-header-title">Discover the secret to spot targeting your</p>
                    <div class="bp-header-subtitle">
                        <?php $tagline = get_bloginfo('description'); if($tagline != '') { ?>
                            <p><?php echo esc_html($tagline); ?></p><?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="bp-animated-block">
                <video autoplay="autoplay" muted>
                    <source src="https://www.beatsliposuction.com/blog/wp-content/uploads/2018/09/NSS-AnimatedB4after-1.mp4" type="video/mp4" />
                </video>
            </div>
        </div>
        <!-- /Header Row 2 -->

        <div class="mobile-header-banner">
            <?php if(is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } ?>
        </div>

        <!-- Header Row 3 -->
        <?php $kale_stick_nav_to_top = kale_get_option('kale_stick_nav_to_top'); ?>
        <div class="header-row-3">
            <nav class="navbar navbar-default <?php if($kale_stick_nav_to_top == 1) { ?>stick-to-top <?php } ?>" id="main_menu">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".header-row-3 .navbar-collapse" aria-expanded="false">
                        <span class="sr-only"><?php _e('Toggle Navigation', 'kale'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Navigation -->
                <?php if ( has_nav_menu( 'header' ) ) {
                    $kale_dropdown_smartmenus_enable = kale_get_option('kale_dropdown_smartmenus_enable');
                    $depth = 3; if($kale_dropdown_smartmenus_enable == 0) {$depth = 2;}

                    $args = array('theme_location'    => 'header',
                        'depth'             => $depth,
                        'container'         => 'div',
                        'container_class'   => 'navbar-collapse collapse',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => '',
                        'walker'            => new wp_bootstrap_navwalker() );
                    if(kale_get_option('kale_nav_search_icon') == 1)
                        $args['items_wrap'] = kale_nav_items_wrap();
                    wp_nav_menu( $args );
                } else {
                    //wp_page_menu(array('depth'=>1, 'show_home' => true, 'menu_class'=>'navbar-collapse collapse' ));
                    kale_default_nav();
                }
                ?>
                <!-- /Navigation -->
            </nav>
        </div>
        <!-- /Header Row 3 -->


    </div>
    <!-- /Header -->

    <!-- Mobile View Only - START -->
    <!--
    <div class="sidebar sidebar-column  col-md-4 mobile-view">

    <div class="sidebar-default sidebar-block sidebar-no-borders">
                <div class="textwidget">
                    <a target="_blank" href="http://www.netofficetoolbox.com/SecureCart/SecureCart.aspx?mid=89ED4954-679C-44A2-A251-00564069B47E&amp;gid=f9080e3f1bb90fd802ff2bdf706a24dd&amp;bn=1&amp;clear=1"></a>
                </p>
                <center>
                    <a target="_blank" href="http://www.netofficetoolbox.com/SecureCart/SecureCart.aspx?mid=89ED4954-679C-44A2-A251-00564069B47E&amp;gid=f9080e3f1bb90fd802ff2bdf706a24dd&amp;bn=1&amp;clear=1"><img style="width: 100%;" src="https://www.beatsliposuction.com/blog/wp-content/uploads/2018/09/natural-sculpting-system.png"></a>
                </center>
                <p></p>
                <p></p>
                <center><img src="https://www.beatsliposuction.com/blog/wp-content/uploads/2010/01/liposuctionblogimage.jpg" width="250" height="250"></center>
                <center>
                    <a target="_blank" href="https://www.beatsliposuction.com/liposuction-referral3-new.asp"><img src="https://www.beatsliposuction.com/blog/wp-content/uploads/2009/11/blogliposuctionalternative-300x191.jpg" width="175" height="125"></a>
                    <p></p>

                </center>
            </div>
    </div>
</div>-->
    <!-- Mobile View Only - End -->
<?php
if(is_front_page() && !is_paged() ) {

    $kale_frontpage_order = kale_get_option('kale_frontpage_order');
    if ( ! empty( $kale_frontpage_order ) && is_array( $kale_frontpage_order ) ) {

        $key = array_search('kale_frontpage_order_feed', $kale_frontpage_order);
        $before_feed = array_slice($kale_frontpage_order, 0, $key);

        foreach($before_feed as $section){
            switch($section){
                //case 'kale_frontpage_order_banner':             //get_template_part('parts/frontpage', 'banner');  break;
                case 'kale_frontpage_order_featured_posts':     get_template_part('parts/frontpage', 'featured');  break;
                case 'kale_frontpage_order_large':              get_template_part('parts/frontpage', 'large');  break;
                case 'kale_frontpage_order_vertical':           get_template_part('parts/frontpage', 'vertical');  break;
            }
        }
    }
}
?>