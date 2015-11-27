<aside class="news-most-ref">
    <h4 class="title"><span>Tin xem nhiều</span></h4>
    <?php
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => 10,
        'order' => 'DESC',
        'orderby' => 'meta_value_num',
        'meta_key' => 'view-news',
        'tax_query' => array(
            array(
                'taxonomy' => 'news-type',
                'field' => 'slug',
                'terms' => array('recruiting'),
                'operator' => 'NOT IN',
            ),
        ),
    );
    $loop = new WP_Query($args);
    ?>
    <ul>
        <?php if ($loop->have_posts()): ?>
            <?php while ($loop->have_posts()): $loop->the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>">
                        <span><?php the_title() ?></span>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata() ?>
    </ul>
</aside>