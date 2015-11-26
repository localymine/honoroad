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
            <?php get_sidebar('news-left') ?>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="col-xs-12 col-md-10 nopadding">
                <article class="news-detail">
                    <h2><span><?php echo $post->post_title ?></span></h2>
                    <p><?php echo $post->post_content ?></p>
                </article>
            </div>
            <div class="col-xs-12 col-md-2 nopadding">

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>