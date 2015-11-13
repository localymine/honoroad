<?php
/*
 * Author: KhangLe
 * Template Name: Index
 *
 */
get_header();
?>

<!-- silder -->
<div data-ride="carousel" class="carousel slide" id="myCarousel">
    <div role="listbox" class="carousel-inner">
        <div class="item active" style="background: url('<?php echo get_template_directory_uri() ?>/images/slide-1-b.png') fixed 0 0 / cover;"></div>
        <div class="item" style="background: url('<?php echo get_template_directory_uri() ?>/images/slide-2-b.png') fixed 0 0 / cover;"></div>
    </div>
    <a data-slide="prev" role="button" href="#myCarousel" class="left carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a data-slide="next" role="button" href="#myCarousel" class="right carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- silder end -->

<!-- product -->
<div class="container product">
    <div class="row">
        <?php
        $i = 1;
        $args = array(
            'hide_empty' => 0
        );
        $terms = get_terms('product-line', $args);
        ?>
        <?php foreach ($terms as $term): ?>
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product-line',
                        'field' => 'slug',
                        'terms' => array($term->slug),
                    ),
                ),
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <?php while ($loop->have_posts()): $loop->the_post(); ?>
                    <div class="col-xs-12 col-md-4 prod-block wow fadeInUp" data-wow-delay="<?php echo $i * 0.5 ?>s">
                        <a href="<?php the_permalink() ?>">
                            <article id="item-1" class="item">
                                <?php if (have_rows('images')): ?>
                                    <?php while (have_rows('images')): the_row(); ?>
                                        <?php
                                        $image = get_sub_field('image');
                                        // thumbnail
                                        $size = 'large';
                                        $thumb = $image['sizes'][$size];
                                        ?>
                                        <img class="img-responsive" src="<?php echo $thumb ?>" alt="<?php the_title() ?>"/>
                                        <?php break; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <div class="prod-title"><h1><?php the_title() ?></h1></div>
                            </article>
                        </a>
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php wp_reset_postdata() ?>
    </div>
</div>
<!-- product end -->

<!-- information -->
<div class="container information">
    <div class="row">
        <?php
        $i = 1;
        $args = array(
            'post_type' => 'top-about',
            'posts_per_page' => 3,
        );
        $loop = new WP_Query($args);
        ?>
        <?php if ($loop->have_posts()): ?>
            <?php while ($loop->have_posts()): $loop->the_post(); ?>
                <div class="col-xs-12 col-md-4 wow fadeInUp" data-wow-delay="<?php echo $i * 0.5 ?>s">
                    <div class="module-info">
                        <header>
                            <h2 class="module-title"><span><?php the_title() ?></span></h2>
                        </header>
                        <div class="mod-article">
                            <div class="item-info">
                                <?php the_excerpt() ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata() ?>
    </div>
</div>
<!-- information end -->

<!-- main bottom -->
<div id="main-bottom" class="margin-top-lg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 wow fadeInUp" data-wow-delay="3.5s">
                <article>
                    <figure>
                        <img class="img-responsive center-block" src="<?php echo get_template_directory_uri() ?>/images/c-logo-1.jpg"/>
                    </figure>
                </article>
            </div>
            <div class="col-xs-12 col-md-4 wow fadeInUp" data-wow-delay="3.75s">
                <article>
                    <figure>
                        <img class="img-responsive center-block" src="<?php echo get_template_directory_uri() ?>/images/c-logo-2.jpg"/>
                    </figure>
                </article>
            </div>
            <div class="col-xs-12 col-md-4 wow fadeInUp" data-wow-delay="4s">
                <article>
                    <figure>
                        <img class="img-responsive center-block" src="<?php echo get_template_directory_uri() ?>/images/c-logo-3.jpg"/>
                    </figure>
                </article>
            </div>
        </div>
    </div>
</div>
<!-- main bottom end -->

<!-- bottom -->
<div id="bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="0.25s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-map-marker fa-3x"></i>
                        <h2><span>Địa Chỉ</span></h2>
                        <div class="item-introtext">
                            <p>
                                26A KCN Long Giang, Xã Lập 1, Huyện Tân Phước, Tĩnh Tiền Giang
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="1.5s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-phone fa-3x"></i>
                        <h2><span>Điện Thoại</span></h2>
                        <div class="item-introtext">
                            <p>
                                0123 456 789
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="1.75s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-envelope-o fa-3x"></i>
                        <h2><span>Email</span></h2>
                        <div class="item-introtext">
                            <p>
                                <a href="mailto:leduongkhang@gmail.com">leduongkhang@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="2s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-envelope-o fa-3x"></i>
                        <h2><span>Follow Us</span></h2>
                        <div class="item-introtext">
                            <p>
                                <a class="padding-lt-rt-md"><i class="fa fa-facebook fa-4x"></i></a>
                                <a class="padding-lt-rt-md"><i class="fa fa-twitter fa-4x"></i></a>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<!-- bottom end-->

<?php get_footer(); ?>