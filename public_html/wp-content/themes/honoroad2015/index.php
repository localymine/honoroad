<?php
/*
 * Author: KhangLe
 * Template Name: Index
 *
 */
get_header();
?>

<!-- silder -->
<?php
$args = array(
    'post_type' => 'home-slider',
    'posts_per_page' => -1,
    'orderby' => array('date' => 'DESC'),
);
$loop = new WP_Query($args);
$home_slider = array();
if ($loop->have_posts()) {
    while ($loop->have_posts()) {
        $loop->the_post();
        while (have_rows('images')) {
            the_row();
            $image = get_sub_field('image');
            $full = $image['url'];
            $home_slider[]['image'] = $full;
        }
    }
}
?>
<div data-ride="carousel" class="carousel slide" id="myCarousel">
    <div role="listbox" class="carousel-inner">
        <?php for ($i = 0; $i < count($home_slider); $i++): ?>
                <!--<div class="item <?php echo ($i == 0) ? 'active' : '' ?>" style="background: url('<?php echo $home_slider[$i]['image'] ?>') repeat fixed center 7.8em / cover;background-position: 0 110em;" ></div>-->
            <div class="item <?php echo ($i == 0) ? 'active' : '' ?>" style="background: url('<?php echo $home_slider[$i]['image'] ?>');background-size: cover;" ></div>
        <?php endfor; ?>
    </div>
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
                    <div class="col-xs-12 col-md-4 prod-block wow fadeInUp" data-wow-delay="<?php echo $i * 0.25 ?>s">
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
                <div class="col-xs-12 col-md-4 wow fadeInUp" data-wow-delay="<?php echo $i * 0.25 ?>s">
                    <div class="module-info">
                        <header>
                            <h2 class="module-title"><span><?php the_title() ?></span></h2>
                        </header>
                        <div class="mod-article">
                            <div class="item-info">
                                <?php the_excerpt() ?>
                            </div>
                        </div>
                        <?php if (get_field('show_button')): ?>
                            <a href="<?php echo (get_field('link_to') != '') ? get_field('link_to') : get_permalink() ?>" class="btn btn-oil center-block"><i class="fa fa-angle-double-right fa-3x"></i></a>
                        <?php endif; ?>
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
            <?php
            $i = 1;
            $args = array(
                'post_type' => 'partner-info',
                'posts_per_page' => -1,
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <?php while ($loop->have_posts()): $loop->the_post(); ?>
                    <?php
                    $image = get_field('logo');
                    // thumbnail
                    $size = 'medium';
                    $thumb_logo = $image['sizes'][$size];
                    ?>
                    <div class="col-xs-12 col-md-4 wow fadeInUp" data-wow-delay="<?php echo $i * 0.25 ?>s">
                        <article>
                            <figure>
                                <img class="img-responsive center-block" src="<?php echo $thumb_logo ?>"/>
                            </figure>
                        </article>
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata() ?>
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
                                <?php echo $omw_theme_settings->ct_company_address ?>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="0.5s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-phone fa-3x"></i>
                        <h2><span>Điện Thoại</span></h2>
                        <div class="item-introtext">
                            <p>
                                <?php echo $omw_theme_settings->ct_company_telephone ?>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="0.75s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-envelope-o fa-3x"></i>
                        <h2><span>Email</span></h2>
                        <div class="item-introtext">
                            <p>
                                <a href="mailto:<?php echo $omw_theme_settings->ct_company_email ?>"><?php echo $omw_theme_settings->ct_company_email ?></a>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="1s">
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

<!-- footer -->
<div id="footer">
    <div id="map" class="map">
        <?php echo $omw_theme_settings->ct_company_google_map ?>
    </div>
</div>
<!-- footer end -->

<?php get_footer(); ?>