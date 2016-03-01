<?php
/*
 * Author: KhangLe
 *
 */
get_header();
setPostViews($post->ID, 'view-news');
?>

<div class="container news margin-top-xl margin-bottom-xl">
    <div class="row">
        <div class="col-xs-12 col-md-2">
            <?php get_sidebar('news-left') ?>
        </div>
        <div class="col-xs-12 col-md-7">
            <article class="news-detail">
                <h2><span><?php echo $post->post_title ?></span></h2>
                <?php get_template_part('part-share') ?>
                <p><?php echo $post->post_content ?></p>
                <?php get_template_part('part-share') ?>
            </article>
        </div>
        <div class="col-xs-12 col-md-3">
            <?php get_sidebar('news-right') ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>