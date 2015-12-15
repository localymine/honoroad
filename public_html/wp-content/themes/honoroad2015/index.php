<?php
/*
 * Author: KhangLe
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
//
wp_reset_postdata();
?>
<div class="row nopadding nomargin" style="min-height: 50px;">
    <!-- Jssor Slider Begin -->
    <div id="slider1_container">
        <!-- Loading Screen -->
        <div class="box-loading" u="loading">
            <div class="box-loading-overlay"></div>
            <div class="box-loading-img"></div>
        </div>
        <!-- Slides Container -->
        <div class="box-slider" u="slides">
            <?php for ($i = 0; $i < count($home_slider); $i++): ?>
                <div>
                    <img u="image" src2="<?php echo $home_slider[$i]['image'] ?>" />
                </div>
            <?php endfor; ?>
        </div>

        <!--#region Bullet Navigator Skin Begin -->
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb21">
            <!-- bullet navigator item prototype -->
            <div u="prototype"></div>
        </div>
        <!--#endregion Bullet Navigator Skin End -->

        <!--#region Arrow Navigator Skin Begin -->
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora21l"></span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora21r"> </span>
        <!--#endregion Arrow Navigator Skin End -->
    </div>
    <!-- Jssor Slider End -->
</div>

<!-- silder end -->

<!-- product -->
<div class="container product">
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
        );
        $loop = new WP_Query($args);
        ?>
        <div class="col-xs-12">
            <div id="jssor_1">
                <!-- Loading Screen -->
                <div class="box-loading" data-u="loading">
                    <div class="box-loading-overlay"></div>
                    <div class="box-loading-img"></div>
                </div>
                <div class="box-slider" data-u="slides">
                    <?php if ($loop->have_posts()): ?>
                        <?php while ($loop->have_posts()): $loop->the_post(); ?>    
                            <div class="col-xs-12 col-md-4 box-item prod-block">
                                <a href="<?php the_permalink() ?>">
                                    <article id="item-<?php the_ID() ?>" class="item">
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
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata() ?>
                </div>
                <!-- Bullet Navigator -->
                <div data-u="navigator" class="box-navigator jssorb03">
                    <!-- bullet navigator item prototype -->
                    <div class="box-prototype" data-u="prototype">
                        <div data-u="numbertemplate"></div>
                    </div>
                </div>
                <!-- Arrow Navigator -->
                <span data-u="arrowleft" class="box-arrowleft jssora03l"></span>
                <span data-u="arrowright" class="box-arrowright jssora03r"></span>
            </div>
        </div>
    </div>
</div>
<!-- product end -->

<!-- information -->
<div class="container information">
    <div class="row">
        <?php
        $i = 1;
        $args = array(
            'post_type' => 'info',
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
                                <?php
                                if (the_excerpt() == '') {
                                    the_content();
                                } else {
                                    the_excerpt();
                                }
                                ?>
                            </div>
                        </div>
                        <?php if (get_field('show_button')): ?>
                            <a href="<?php echo (get_field('link_to') != '') ? get_field('link_to') : get_permalink() ?>" class="btn btn-oil center-block"><i class="fa fa-angle-double-right fa-2x"></i></a>
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

<?php get_template_part('part-company-info') ?>

<?php get_template_part('part-google-map') ?>

<?php get_footer(); ?>