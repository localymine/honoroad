<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<div class="container news margin-top-xl margin-bottom-xl">
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <ul class="">
                <?php
                $args = array(
                    'post_type' => 'news',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                );
                $loop = new WP_Query($args);
                ?>
                <?php if ($loop->have_posts()): ?>
                    <?php while ($loop->have_posts()): $loop->the_post(); ?>
                        <li>
                            <?php $prod_img = get_field('images'); ?>
                            <a href="<?php the_permalink() ?>">
                                <img width="50" src="<?php echo $prod_img[0]['image']['sizes']['thumbnail'] ?>" alt="<?php the_title() ?>"/>
                                <span><?php the_title() ?></span>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata() ?>
            </ul>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="col-xs-12 col-md-9">
                
            </div>
            <div class="col-xs-12 col-md-3">

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>