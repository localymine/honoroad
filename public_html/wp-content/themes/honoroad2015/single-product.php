<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<!-- product detail -->
<div class="container prodcut-detail margin-top-xl margin-bottom-xl">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="thumb-list clearfix">
                <?php while (have_rows('images')): the_row(); ?>
                    <?php
                    $prod_img = get_sub_field('image');
                    //
                    $url = $prod_img['url'];
                    $size = 'thumbnail';
                    $prod_thumb = $prod_img['sizes'][$size];
                    ?>

                    <ul class="touch-list">
                        <li>
                            <a href="javascript:void(0)" data-full="<?php echo $url ?>"><img width="50" src="<?php echo $prod_thumb ?>"/></a>
                        </li>
                    </ul>

                <?php endwhile; ?>
            </div>
            <div class="image-block clearfix">
                <?php $prod_img = get_field('images'); ?>
                <img class="img-responsive center-block" src="<?php echo $prod_img[0]['image']['url'] ?>" />
            </div>

            <div class="box-prod-info">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Loại</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <?php if (have_rows('price_plans')): ?>
                        <?php while (have_rows('price_plans')): the_row(); ?>
                            <tr>
                                <td><?php echo get_sub_field('weight') ?></td>
                                <td align="right" class=""><span class="new-price padding-right-lg"><?php echo get_sub_field('price') ?></span></td>
                                <td>
                                    <div class="box-add-to-cart">
                                        <input type="text" class="text" value="1"/>
                                        <a href="javascript:void(0)" class="quan-edit quan-minus"><span><i class="fa fa-minus"></i></span></a>
                                        <a href="javascript:void(0)" class="quan-edit quan-plus"><span><i class="fa fa-plus"></i></span></a>
                                        <button class="btn btn-default btn-sm btn-add-cart" data-id="<?php the_ID() ?>" data-weight="<?php echo get_sub_field('weight') ?>"><span>Thêm</span></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </table>
            </div>

        </div>
        <div class="col-xs-12 col-md-6">
            <h2 class="prod-name"><?php the_title() ?></h2>
            <div class="prod-detail">
                <?php if (trim(get_field('ingredients')) != ''): ?>
                    <div class="prod-attr">Thành phần:</div> 
                    <p>
                        <?php echo get_field('ingredients') ?>
                    </p>
                <?php endif; ?>
                <?php if (trim(get_field('features')) != ''): ?>
                    <div class="prod-attr">Đặc điểm:</div>
                    <p>
                        <?php echo get_field('features') ?>
                    </p>
                <?php endif; ?>
                <h5 class="prod-attr">Tiêu chuẩn chất lượng</h5>
                <?php if (have_rows('sensory')): ?>
                    <div class="prod-attr">Chỉ tiêu cảm quan</div>
                    <p>
                        <?php while (have_rows('sensory')): the_row(); ?>
                            <?php echo get_sub_field('attribute') ?>：<?php echo get_sub_field('description') ?><br/>
                        <?php endwhile; ?>
                    </p>
                <?php endif; ?>
                <?php if (have_rows('physical_and_chemical_indicators')): ?>
                    <div class="prod-attr">Chỉ số lý hóa</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hạng mục</th>
                                <th>Đơn vị</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <?php while (have_rows('physical_and_chemical_indicators')): the_row(); ?>
                            <tr>
                                <td><?php echo get_sub_field('item') ?></td>
                                <td><?php echo get_sub_field('unit') ?></td>
                                <td><?php echo get_sub_field('amount') ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php endif; ?>
                <?php if (trim(get_field('usage')) != ''): ?>
                    <div class="prod-attr">Công dụng</div>
                    <p>
                        <?php echo get_field('usage') ?>
                    </p>
                <?php endif; ?>
                <?php if (trim(get_field('target_user')) != ''): ?>
                    <div class="prod-attr">Đối tượng sử dụng</div>
                    <p>
                        <?php echo get_field('target_user') ?>
                    </p>
                <?php endif; ?>
                <?php if (trim(get_field('preservation')) != ''): ?>
                    <div class="prod-attr">Bảo quản</div>
                    <p>
                        <?php echo get_field('preservation') ?>
                    </p>
                <?php endif; ?>
                <?php if (trim(get_field('number_of_quality_standard')) != ''): ?>
                    <div class="prod-attr">Số tiêu chuẩn chất lượng</div>
                    <p>
                        <?php echo get_field('number_of_quality_standard') ?>
                    </p>
                <?php endif; ?>
                <?php if (have_rows('nutritional_information')): ?>
                    <h5 class="prod-attr">Thông tin dinh dưỡng</h5>
                    <div>*Hàm lượng trung bình trong mỗi khẩu phần</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hạng mục</th>
                                <th>*14g</th>
                                <th>*100g</th>
                            </tr>
                        </thead>
                        <?php while (have_rows('nutritional_information')): the_row(); ?>
                            <tr>
                                <td><?php echo get_sub_field('attribute') ?></td>
                                <td><?php echo get_sub_field('average_in_14g') ?></td>
                                <td><?php echo get_sub_field('average_in_100g') ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php endif; ?>
                <?php if (trim(get_field('usage_in_field')) != ''): ?>
                    <div class="prod-attr">Dùng cho lĩnh vực</div>
                    <p>
                        <?php echo get_field('usage_in_field') ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (have_rows('feature_images')): ?>
            <div class="col-xs-12 col-md-3">
                <div class="prod-img-features">
                    <?php while (have_rows('feature_images')): the_row(); ?>
                        <?php
                        $feature_images = get_sub_field('image');
                        //
                        $url = $feature_images['url'];
                        $size = 'medium';
                        $feature_images_thumb = $feature_images['sizes'][$size];
                        ?>
                        <a class="fancybox" href="<?php echo $url ?>" rel="usage-products" class="col-md-3 nopadding"><img class="img-responsive" src="<?php echo $feature_images_thumb ?>" alt=""/></a>
                        <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- product detail //-->

<?php get_footer(); ?>