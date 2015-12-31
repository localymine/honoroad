<?php
/**
 * 
 * Author: KhangLe
 * Template Name: Product - Order
 * 
 */
get_header();
?>


<?php
global $current_user;
get_currentuserinfo();

$user_id = $current_user->ID;
?>

<div class="container margin-top-xl margin-bottom-xl">
    <!--<form class="form-horizontal" method="post" id="adduser" action="">-->
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <input class="form-control" name="user_fullname" type="text" id="user_fullname" placeholder="Fullname" value="<?php echo esc_attr(get_the_author_meta('user_fullname', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <input class="form-control" name="user_phonenumber" type="text" id="user_phonenumber"  placeholder="Phonenumber" value="<?php echo esc_attr(get_the_author_meta('user_phonenumber', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <input class="form-control" name="user_address" type="text" id="user_address"  placeholder="Address" value="<?php echo esc_attr(get_the_author_meta('user_address', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <textarea class="form-control vert"  placeholder="Comment"></textarea>
            </div>

            <?php
            // action hook for plugin and extra fields
            do_action('edit_user_profile', $current_user);
            ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button name="order" id="updateuser" type="submit" class="btn btn-success">Order</button>
                    <input name="action" type="hidden" id="action" value="client-order" />
                </div>
            </div>
        </div>

        <div class="col-md-8" ng-controller="ProductListCtrl">

            <p>{{ 1 + 3 }}</p>


            <pre>
First you need to create a controller.

https://docs.angularjs.org/api/ng/directive/ngController

Than you need to create a method in your controller that pushing your item and amount to an array. Assign that function to your button click via:

https://docs.angularjs.org/api/ng/directive/ngClick

In your html you need to loop your array in order to add your record to table.

https://docs.angularjs.org/api/ng/directive/ngRepeat

There is many things needs to be done for what you are asking. Please check the docs, if you don't understand or face with an error of yourse you can ask again.
            </pre>

            <hr/>
            <ul>
                <li ng-repeat="product in products">
                    <a href="javascript:void(0)">
                        <img width="32" src="{{product.image}}" alt="{{product.title}}" />
                        <h2 class="prod-title">{{product.title}}</h2>
                    </a>
                </li>
            </ul>
            <hr/>
            <ul class="ul-rs lst-pd-order">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                );
                $loop = new WP_Query($args);
                ?>
                <?php if ($loop->have_posts()): ?>
                    <?php while ($loop->have_posts()): $loop->the_post(); ?>
                        <li>
                            <a href="javascript:void(0)">
                                <?php if (have_rows('images')): ?>
                                    <?php while (have_rows('images')): the_row(); ?>
                                        <?php
                                        $image = get_sub_field('image');
                                        // thumbnail
                                        $size = 'thumbnail';
                                        $thumb = $image['sizes'][$size];
                                        ?>
                                        <img width="32" src="<?php echo $thumb ?>" alt="<?php the_title() ?>" />
                                        <?php break; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <h2 class="prod-title"><?php the_title() ?></h2>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>


        </div>

    </div>
    <!--</form>-->
</div>

<?php get_footer(); ?>