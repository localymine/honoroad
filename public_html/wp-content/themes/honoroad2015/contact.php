<?php
/*
 * Author: KhangLe
 * Template Name: Contact
 *
 */
get_header();
?>

<!-- bottom -->
<div id="bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="0.25s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-map-marker fa-3x"></i>
                        <h2><span>Địa Chỉ</span></h2>
                        <div class="item-introtext">
                            <p>
                                <?php echo $omw_theme_settings->ct_company_address ?>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="0.5s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-phone fa-3x"></i>
                        <h2><span>Điện Thoại</span></h2>
                        <div class="item-introtext">
                            <p>
                                <?php echo $omw_theme_settings->ct_company_telephone ?>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="0.75s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-envelope-o fa-3x"></i>
                        <h2><span>Email</span></h2>
                        <div class="item-introtext">
                            <p>
                                <a href="mailto:<?php echo $omw_theme_settings->ct_company_email ?>"><?php echo $omw_theme_settings->ct_company_email ?></a>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-md-3 wow fadeInUp" data-wow-delay="1s">
                <article>
                    <div class="item-content">
                        <i class="fa fa-envelope-o fa-3x"></i>
                        <h2><span>Follow Us</span></h2>
                        <div class="item-introtext">
                            <p>
                                <a class="padding-lt-rt-md"><i class="fa fa-facebook fa-4x"></i></a>
                                <a class="padding-lt-rt-md"><i class="fa fa-twitter fa-4x"></i></a>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<!-- bottom end-->

<!-- footer -->
<div id="footer">
    <div id="map" class="map">
        <?php echo $omw_theme_settings->ct_company_google_map ?>
    </div>
</div>
<!-- footer end -->

<?php get_footer(); ?>