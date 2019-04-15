<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130780459-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-130780459-1');
    </script>
</head>

<body <?php body_class(); ?>>

<?php do_action('main-wrapper-open'); ?>
<div class="site-news">
    <div class="header-area">
        <!-- Header-bottom start -->
        <div class="container">
            <div class="">
                <!-- logo start -->
                <div class="logo">
                    <a href="<?php echo home_url() ?>" title="<?php bloginfo('name') ?> - <?php bloginfo('description') ?>">
                        <img src="<?php echo get_theme_mod('logo') ?>" alt="<?php bloginfo('name') ?> - <?php bloginfo('description') ?>">
                    </a>
                </div>
                <!-- logo end -->
            </div>
        </div>
        <div class="menu-top">
           <div class="container">
               <div class="row">
                    <div class="col-lg-11 col-md-6 d-none d-lg-block">
                        <div class="main-menu-area">
                            <nav class="main-navigation">
                                <?php wp_nav_menu([
                                        'container' => '',
                                        'theme_location' => 'primary'
                                ]) ?>
                            </nav>
                        </div>
                    </div>
                </div>
           </div> 
        </div>
    </div>
<!-- Header-bottom end -->
<?php echo do_shortcode('[vutin_slider_home]') ?>