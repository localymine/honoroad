<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<!-- product all -->
<div class="container product-all margin-top-lg margin-bottom-lg">

    <?php
    $args = array(
        'hide_empty' => 0
    );
    $terms = get_terms('product-line', $args);
    ?>
    <?php foreach ($terms as $term): ?>
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
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
        <div class="row margin-top-xl">
            <h1 class="prod-cat"><span><?php echo $term->name ?></span></h1>
            <?php if ($loop->have_posts()): ?>
                <?php while ($loop->have_posts()): $loop->the_post(); ?>
                    <div class="col-xs-12 col-md-4">
                        <a href="<?php the_permalink() ?>">
                            <?php if (have_rows('images')): ?>
                                <?php while (have_rows('images')): the_row(); ?>
                                    <?php
                                    $image = get_sub_field('image');
                                    // thumbnail
                                    $size = 'large';
                                    $thumb = $image['sizes'][$size];
                                    ?>
                                    <img class="img-responsive" src="<?php echo $thumb ?>" alt="<?php the_title() ?>" />
                                    <?php break; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <h2 class="prod-title"><?php the_title() ?></h2>
                            <p><?php echo get_field('description') ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

</div>
<!-- product all //-->

<?php get_footer(); ?>