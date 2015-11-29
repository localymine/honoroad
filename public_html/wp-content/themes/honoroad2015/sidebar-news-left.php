<aside class="news-sidebar">
    <h4 class="title">Thông tin</h4>
    <ul>
        <?php
        $args = array(
            'hide_empty' => 0
        );
        $terms = get_terms('news-type', $args);
        ?>
        <?php foreach ($terms as $term): ?>
            <?php
            $args = array(
                'post_type' => 'news',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'news-type',
                        'field' => 'slug',
                        'terms' => array($term->slug),
                    ),
                ),
            );
            $loop = new WP_Query($args);
            ?>
            <li><h5 class="head-news-type"><?php echo $term->name ?></h5></li>
            <ul>
                <?php if ($loop->have_posts()): ?>
                    <?php while ($loop->have_posts()): $loop->the_post(); ?>
                        <li>
                            <?php $image = get_field('image'); ?>
                            <a href="<?php the_permalink() ?>">
                                <img width="50" src="<?php echo $image['sizes']['thumbnail'] ?>" alt="<?php the_title() ?>"/>
                                <span><?php the_title() ?></span>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata() ?>
            </ul>
        <?php endforeach; ?>
    </ul>
</aside>