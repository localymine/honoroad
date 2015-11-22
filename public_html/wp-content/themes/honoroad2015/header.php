<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Top Page</title>
        <meta charset="UTF-8">
        <meta content="IE=9" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description">
        <meta content="" name="author">

        <link href="<?php echo get_template_directory_uri() ?>/images/favicon.png" rel="shortcut icon">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/jquery.sidr.light.css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/fancybox/jquery.fancybox.css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <?php
        global $omw_theme_settings;
        $logo = (object) json_decode($omw_theme_settings->ct_company_logo);
        ?>
    </head>
    <body>
        <div class="navbar-wrapper">
            <!-- hotline -->
            <header class="hot-top">
                <div class="container">
                    <ul class="top-menu pull-right nopadding">
                        <li>
                            <i class="fa fa-phone fa-2x"></i><span class="hotline"><?php echo $omw_theme_settings->ct_company_telephone ?></span>
                        </li>
                        <li>
                            <a class="login-menu" href="javascript:void(0)"><i class="fa fa-user"></i></a>
                            <ul class="right">
                                <li>name</li>
                                <li><a href="<?php echo wp_logout_url() ?>">logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>
            <!-- hotline end-->
            <!-- navigator -->
            <header id="header" class="header">
                <nav id="nav" class="navbar navbar-defaultx navbar-oil">
                    <div class="container">
                        <div id="logo" class="navbar-header">
                            <a id="menu-toggle" href="#sidr">
                                <button class="navbar-toggle collapsed">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </a>
                            <a class="navbar-brand nopadding" href="<?php echo bloginfo('url') ?>">
                                <img class="img-responsive" src="<?php echo $logo->url ?>" alt="Honoroad" />
                            </a>
                        </div>
                        <div class="navbar-collapse collapse nopadding">
                            <ul class="top-menu">
                                <li><a class="nav-title active" href="<?php echo bloginfo('url') ?>"><span>Trang chủ</span></a></li>
                                <li>
                                    <a class="nav-title" href="javascript:void(0)"><span>Giới thiệu</span></a>
                                    <ul>
                                        <?php
                                        $args = array(
                                            'post_type' => 'top-about',
                                            'posts_per_page' => 3,
                                        );
                                        $loop = new WP_Query($args);
                                        ?>
                                        <?php if ($loop->have_posts()): ?>
                                            <?php while ($loop->have_posts()): $loop->the_post(); ?>
                                                <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata() ?>
                                        <li><a href="<?php bloginfo('url') ?>/news">Tin tức</a></li>
                                    </ul>
                                </li>
                                <li><a class="nav-title" href="<?php echo bloginfo('url') ?>/product"><span>Sản phẩm</span></a></li>
                                <li><a class="nav-title" href="<?php echo bloginfo('url') ?>/recruit"><span>Tuyển dụng</span></a></li>
                                <li><a class="nav-title" href="<?php echo bloginfo('url') ?>/contact"><span>Liên hệ</span></a></li>
                                <li class="menu-search">
                                    <ul>
                                        <li>
                                            <div>
                                                <ul>
                                                    <li>
                                                        <form class="nav-form">

                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--  wp menu -->
<!--                <div class="clearfix"></div>
                <nav id="nav" class="navbar navbar-defaultx navbar-oil">
                    <?php
                    $defaults = array(
                        'theme_location' => 'header-menu',
                        'menu' => 'Top Menu',
                        'container' => 'div',
                        'container_class' => 'container',
                        'container_id' => '',
                        'menu_class' => 'navbar-collapse collapse nopadding icemegamenu',
                        'menu_id' => 'icemegamenu',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 0,
                        'walker' => ''
                    );
                    wp_nav_menu($defaults);
                    ?>
                </nav>
                <nav id="nav" class="navbar navbar-defaultx navbar-oil">
                    <?php
                    $defaults = array(
                        'theme_location' => 'sales-menu',
                        'menu' => 'Top Menu',
                        'container' => 'div',
                        'container_class' => 'container',
                        'container_id' => '',
                        'menu_class' => 'navbar-collapse collapse nopadding icemegamenu',
                        'menu_id' => 'icemegamenu',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 0,
                        'walker' => ''
                    );
                    wp_nav_menu($defaults);
                    ?>
                </nav>-->
                <!--  wp menu //-->

                <!--side-bar-->
                <ul id="sidr" class="m-sidebar">
                    <li><a class="active" href="<?php echo bloginfo('url') ?>"><span>Trang chủ</span></a></li>
                    <li>
                        <a class="" href="javascript:void(0)"><span>Giới thiệu</span></a>
                        <ul class="sub-menu-sidr">
                            <?php
                            $args = array(
                                'post_type' => 'top-about',
                                'posts_per_page' => 3,
                            );
                            $loop = new WP_Query($args);
                            ?>
                            <?php if ($loop->have_posts()): ?>
                                <?php while ($loop->have_posts()): $loop->the_post(); ?>
                                    <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_postdata() ?>
                            <li><a href="<?php bloginfo('url') ?>/news">Tin tức</a></li>
                        </ul>
                    </li>
                    <li><a class="" href="<?php echo bloginfo('url') ?>/product"><span>Sản phẩm</span></a></li>
                    <li><a class="" href="<?php echo bloginfo('url') ?>/recruit"><span>Tuyển dụng</span></a></li>
                    <li><a class="" href="<?php echo bloginfo('url') ?>/contact"><span>Liên hệ</span></a></li>
                    <li class="menu-search">
                    <li>
                        <form class="nav-form">

                        </form>
                    </li>
                </ul>
                <!--side-bar-->
            </header>
            <!-- navigator -->
        </div>