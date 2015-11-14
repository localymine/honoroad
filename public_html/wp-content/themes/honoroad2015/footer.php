<?php
global $omw_theme_settings;
?> 
<!-- footer -->
        <div id="footer">
            <div id="map" class="map">
                <?php echo $omw_theme_settings->ct_company_google_map ?>
            </div>
        </div>
        <!-- footer end -->

        <!-- footer wrapper -->
        <div id="footer-wrapper">
            <div class="footer-wrapper-inner">
                <div id="copyright">
                    <div class="container">
                        <div class="col-xs-12 copyright padding-bottom-md padding-top-xxl">
                            <a class="footer-logo" href="#"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png"/></a>
                            <span class="priv">
                                <span class="copy"><i class="fa fa-copyright"></i></span>
                                <span class="year">2015</span>
                                <a class="privacy_link" href="#">Privacy Policy</a>
                            </span>
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
        <script src="<?php echo get_template_directory_uri() ?>/js/jquery.sidr.min.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/js/jquery.parallax.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/js/wow.min.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/js/common.js"></script>
    </body>
</html>