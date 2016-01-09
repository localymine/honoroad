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
                <input ng-model="po.purchase_order_name" class="form-control" name="user_fullname" type="text" id="user_fullname" placeholder="Fullname" value="<?php echo esc_attr(get_the_author_meta('user_fullname', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <input ng-model="po.purchase_order_phone" class="form-control" name="user_phonenumber" type="text" id="user_phonenumber"  placeholder="Phonenumber" value="<?php echo esc_attr(get_the_author_meta('user_phonenumber', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <input ng-model="po.purchase_order_email" class="form-control" name="user_email" type="text" id="user_email"  placeholder="Email" value="<?php echo esc_attr(get_the_author_meta('user_email', $current_user->ID)) ?>">
            </div>
            
            <div class="form-group">
                <input ng-model="po.purchase_order_address" class="form-control" name="user_address" type="text" id="user_address"  placeholder="Address" value="<?php echo esc_attr(get_the_author_meta('user_address', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <textarea ng-model="po.purchase_order_comment" class="form-control vert"  placeholder="Comment"></textarea>
            </div>
        </div>

        <div class="col-md-8" ng-controller="ProductListCtrl">
            <table class="table">
                <thead>
                    <tr>
                        <th width="5"></th>
                        <th>Sản phẩm</th>
                        <th width="40"></th>
                        <th width="80">Số lượng</th>
                        <th width="60">Đơn vị</th>
                        <th width="60">
                            <div class="text-center">
                                <a href="javascript:void(0)" ng-click="add_row()" class="text-success"><i class="fa fa-plus-circle fa-2x"></i></a>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-model="r" ng-repeat="r in rows">
                        <td>{{$index + 1}}</td>
                        <td>
                            <select ng-change="get_product_details(r)" ng-model="r.id" ng-options="p.id as p.title for p in products" class="form-control">
                                <option value="">== Chọn sản phẩm ==</option>
                            </select>
                        </td>
                        <td>
                            <img width="32" ng-model="r.image" ng-src="{{r.image}}" alt="{{r.title}}" />
                        </td>
                        <td>
                            <input type="text" ng-model="r.quantity" value="0" class="form-control" />
                        </td>
                        <td><small>Thùng</small></td>
                        <td>
                            <div class="text-center">
                                <a href="javascript:void(0)" ng-click="sub_row(r)" class="text-danger"><i class="fa fa-minus-circle fa-2x"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            <div class="text-center">
                <div class="center-block">
                    <button ng-click="save_order(po)" name="order" id="updateuser" class="btn btn-success">Order</button>
                </div>
            </div>
        </div>

    </div>
    <!--</form>-->
</div>

<?php get_footer(); ?>