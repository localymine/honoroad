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
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css"/>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php
        global $omw_theme_settings;
        $logo = (object) json_decode($omw_theme_settings->ct_company_logo);
        ?>
    </head>
    <body>
        <!-- http://dummyimage.com/2048x560/FF4B91/ffffff.png&text=2 -->
        <div class="navbar-wrapper">
            <!-- hotline -->
            <header class="hot-top">
                <div class="container">
                    <ul class="pull-right nopadding">
                        <li>
                            <i class="fa fa-phone fa-2x"></i><span class="hotline"><?php echo $omw_theme_settings->ct_company_telephone ?></span>
                        </li>
                        <li>
                            <a class="login-menu" href="javascript:void(0)"><i class="fa fa-user"></i></a>
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
                        <div class="navbar-collapse collapse nopadding icemegamenu">
                            <ul id="icemegamenu">
                                <li><a class="nav-title active" href="<?php echo bloginfo('url') ?>"><span>Trang chủ</span></a></li>
                                <li class="ice-lv1">
                                    <a class="nav-title" href="javascript:void(0)"><span>Giới thiệu</span></a>
                                    <div class="ice-cols">
                                        <ul class="icesubmenu sub-lv1">
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
                                    </div>
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