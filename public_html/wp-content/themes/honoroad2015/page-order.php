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

            Search: <input ng-model="query">
            <hr/>
            Sort by:
            <select ng-model="orderProp">
                <option value="title">Alphabetical</option>
                <option value="id">ID</option>
            </select>
            <hr/>
            <ul class="ul-rs lst-pd-order">
                <li id="{{product.id}}" ng-repeat="product in products| filter:query | orderBy:orderProp">
                    <a href="javascript:void(0)" data-slug="{{product.slug}}">
                        <img width="32" ng-src="{{product.image}}" alt="{{product.title}}" />
                        <h2 class="prod-title">{{product.title}}</h2>
                    </a>
                </li>
            </ul>
            <hr/>

        </div>

    </div>
    <!--</form>-->
</div>

<?php get_footer(); ?>