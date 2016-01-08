<?php
global $omw_theme_settings;
$logo = (object) json_decode($omw_theme_settings->ct_company_logo);
?>
<!-- footer wrapper -->
<div id="footer-wrapper">
    <div class="footer-wrapper-inner">
        <div id="copyright" class="vertical-align">
            <div class="container">
                <div class="col-xs-12 copyright padding-bottom-md padding-top-xxl nopadding-left nopadding-right">
                    <div class="col-xs-12 col-md-4">
                        <a class="footer-logo" href="<?php echo home_url() ?>"><img src="<?php echo $logo->url ?>"/></a>
                        <p class="inline-block"><?php echo $omw_theme_settings->ct_company_name ?></p>
                        <p><?php echo $omw_theme_settings->ct_company_address ?></p>
                        <p>Tel: <?php echo $omw_theme_settings->ct_company_telephone ?> - Fax: <?php echo $omw_theme_settings->ct_company_fax ?></p>
                        <p>
                            Email: <a href="mailto:<?php echo $omw_theme_settings->ct_company_email ?>"><?php echo $omw_theme_settings->ct_company_email ?></a>
                        </p>
                        <p>
                            Website: <a href="<?php echo str_replace('http://', 'http://www.', home_url()) ?>"><?php echo str_replace('http://', 'www.', home_url()) ?></a>
                        </p>
                        <p>
                            Website: <a href="http://www.double-horse.com.vn">www.double-horse.com.vn</a>
                        </p>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="row">
                            <span class="priv">
                                <span class="copy"><i class="fa fa-copyright"></i></span>
                                <span class="year">Copyright 2015</span>
                                <?php if ($omw_theme_settings->ct_copyright): ?>
                                    · <h5><?php echo $omw_theme_settings->ct_copyright ?></h5>
                                <?php endif; ?>
                            </span>
                            <p class="text-center">
                                <a href="<?php echo home_url('security') ?>">Chính Sách Bảo Mật</a>
                            </p>
                            <p class="text-center"><small>(bản thử nghiệm)</small></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="row newsletter-form-holder">
                            <form id="newsletter-form" name="newsletter-form" class="newsletter-form form-inline" method="post" action="">
                                <div class="center-block holder">
                                    <div class="form-group">
                                        <input type="text" id="re_newsletter" name="re_newsletter" value="" placeholder="Newsletter" class="form-control" />
                                    </div>
                                    <button type="submit" class="btn btn-success inline-block">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer wrapper end -->

<div id="back-top">
    <a href="javascript:void(0)"><i class="fa fa-chevron-circle-up fa-5x"></i></a>
</div>

<script src="<?php echo get_template_directory_uri() ?>/js/jquery-1.11.2.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jssor.slider.mini.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.sidr.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/wow.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.validate.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.zoom.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.heightLine.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/common.js"></script>

<?php wp_footer(); ?>
</body>
</html>