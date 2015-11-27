<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<div class="row nopadding nomargin" style="min-height: 150px;">
    <div class="header-sta-health">
        <h2></h2>
    </div>
</div>

<div class="container health-nutri margin-top-xl margin-bottom-xl">
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'health',
            'posts_per_page' => 12,
        );
        $loop = new WP_Query($args);
        ?>
        <?php if ($loop->have_posts()): ?>
            <?php while ($loop->have_posts()): $loop->the_post(); ?>
                <?php $image = get_field('image'); ?>
                <div class="col-xs-12 col-md-3">
                    <article>
                        <a class="fancybox" href="#content-<?php the_ID() ?>" rel="health-news" data-id="<?php the_ID() ?>">
                            <figure>
                                <img src="<?php echo $image['sizes']['thumbnail'] ?>" class="img-responsive center-block" />
                            </figure>
                            <h2><?php the_title() ?></h2>
                        </a>
                    </article>
                    <div class="fan-content" id="content-<?php the_ID() ?>">
                        <h2><?php the_title() ?></h2>
                        <p><?php echo $post->post_content ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata() ?>
    </div>
</div>

<?php get_footer(); ?>