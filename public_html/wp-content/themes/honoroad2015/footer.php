<?php
global $omw_theme_settings;
$logo = (object) json_decode($omw_theme_settings->ct_company_logo);
?>
<!-- footer wrapper -->
<div id="footer-wrapper">
    <div class="footer-wrapper-inner">
        <div id="copyright">
            <div class="container">
                <div class="col-xs-12 copyright padding-bottom-md padding-top-xxl">
                    <a class="footer-logo" href="#"><img src="<?php echo $logo->url ?>"/></a>
                    <p><?php echo $omw_theme_settings->ct_head_com_name ?></p>
                    <p><?php echo $omw_theme_settings->ct_company_address ?></p>
                    <p><?php echo $omw_theme_settings->ct_company_telephone ?></p>
                    <p><?php echo $omw_theme_settings->ct_company_fax ?></p>
                    <p>
                        <a href="mailto:<?php echo $omw_theme_settings->ct_company_email ?>"><?php echo $omw_theme_settings->ct_company_email ?></a>
                    </p>
                    <span class="priv">
                        <span class="copy"><i class="fa fa-copyright"></i></span>
                        <span class="year">Copyright 2015
                            <?php if ($omw_theme_settings->ct_copyright): ?>
                                · <h5><?php echo $omw_theme_settings->ct_copyright ?></h5>
                            <?php endif; ?>
                        </span>
                    </span>
                    <p>
                        <a class="privacy_link" href="<?php bloginfo('url') ?>/policy">Privacy Policy</a>
                    </p>
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

<?php if ($omw_theme_settings->ct_use_script): ?>
    <script>
    <?php echo $omw_theme_settings->ct_custom_script; ?>
    </script>
<?php endif; ?>

<?php if (isset($omw_theme_settings->ct_google_analytics)) echo $omw_theme_settings->ct_google_analytics; ?>
<?php if (isset($omw_theme_settings->ct_google_tag_manager)) echo $omw_theme_settings->ct_google_tag_manager; ?>

</body>
</html>