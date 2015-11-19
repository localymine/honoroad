<?php
/*
 * Author: KhangLe
 * Template Name: Contact
 *
 */

/** code here **/

get_header();
?>

<?php get_template_part('part-google-map') ?>

<!-- contact info -->
<div class="container contact-info margin-top-xl margin-bottom-xl">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="contact-info-form">
                <h3>Thông tin phản hồi của khách hàng</h3>
                <form id="contact-info-form" name="contact-info-form" method="post" action="<?php echo bloginfo('url') ?>/contact/confirm">
                    <div class="form-group">
                        <input type="text" id="re_title" name="re_title" value="" placeholder="Chủ đề" class="form-control" />
                    </div>
                    <div class="form-group col-md-6 nopadding-left">
                        <input type="text" id="re_name" name="re_name" value="" placeholder="Tên người liên hệ" class="form-control" />
                    </div>
                    <div class="form-group col-md-6 nopadding-right">
                        <input type="text" id="re_email" name="re_email" value="" placeholder="Email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="re_company" name="re_company" value="" placeholder="Tên công ty" class="form-control" />
                    </div>
                    <div class="form-group col-md-6 nopadding-left">
                        <input type="text" id="re_phone" name="re_phone" value="" placeholder="Điện thoại" class="form-control" />
                    </div>
                    <div class="form-group col-md-6 nopadding-right">
                        <input type="text" id="re_fax" name="re_fax" value="" placeholder="Fax" class="form-control" />
                    </div>
                    <div class="form-group">
                        <textarea id="re_content" name="re_content" class="form-control" placeholder="Nội dung"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="<?php echo $omw_theme_settings->ct_recaptcha_public_key ?>"></div>
                        <div id="catpcha"></div>
                    </div>
                    <div class="form-group">
                        <div class="controls center-block">
                            <button type="submit" class="btn btn-success inline-block">Gửi Mail</button>
                            <button type="reset" class="btn btn-success inline-block">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- contact info end -->

<?php get_template_part('part-company-info') ?>

<?php get_template_part('part-google-map') ?>

<?php get_footer(); ?>