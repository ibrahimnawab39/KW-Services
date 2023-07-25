<!-- Start Footer bottom Area -->
<footer class="footer-1">
    <div class="footer-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo">
                                <a href="#"><img src="<?= $url ?>uploads/settings/<?= $settinginfo["website_footer_logo"] ?>" alt=""></a>
                            </div>
                            <p><?= base64_decode($settinginfo["website_short_desc"]) ?></p>
                            <div class="footer-contacts">
                                <p><span>Tel:</span> <?= $settinginfo["website_phone"] ?></p>
                                <p><span>Email:</span> <?= $settinginfo["website_email"] ?></p>
                                <p><span>Location:</span> <?= $settinginfo["website_address"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Follow us</h4>
                            <div class="footer-icons">
                                <ul>
                                    <?php
                                    if ($socialinfo["fb_link"] != "") {
                                    ?>
                                        <li><a href="<?= $socialinfo["fb_link"] ?>"><i class="fa fa-facebook"></i></a></li>
                                    <?php }
                                    if ($socialinfo["instagram_link"] != "") {
                                    ?>
                                        <li><a href="<?= $socialinfo["instagram_link"] ?>"><i class="fa fa-instagram"></i></a></li>
                                    <?php }
                                    if ($socialinfo["twitter_link"] != "") {
                                    ?>
                                        <li><a href="<?= $socialinfo["twitter_link"] ?>"><i class="fa fa-twitter"></i></a></li>
                                    <?php }
                                    if ($socialinfo["linkedin_link"] != "") {
                                    ?>
                                        <li><a href="<?= $socialinfo["linkedin_link"] ?>"><i class="fa fa-linkedin"></i></a></li>
                                    <?php }
                                    if ($socialinfo["youtube_link"] != "") {
                                    ?>
                                        <li><a href="<?= $socialinfo["youtube_link"] ?>"><i class="fa fa-youtube"></i></a></li>
                                    <?php }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Subscribe</h4>
                            <p>
                                We help agencies to define their new business objectives and then create the road map to get them there by devising a business.
                            </p>
                            <div class="subs-feilds">
                                <div class="suscribe-input">
                                    <input type="email" class="email form-control width-80" id="sus_email" placeholder="Type Email">
                                    <button type="submit" id="sus_submit" class="add-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
            </div>
        </div>
    </div>
    <!-- End footer area -->
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="copyright">
                        <p>
                            Copyright © 2023
                            <a href="https://www.linkedin.com/in/ibrahim-nawab/" target="_blank">Ibrahim Nawab</a> All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- all js here -->
<!-- jquery latest version -->
<script src="<?= $url ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap js -->
<script src="<?= $url ?>assets/js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="<?= $url ?>assets/js/owl.carousel.min.js"></script>
<!-- Counter js -->
<script src="<?= $url ?>assets/js/jquery.counterup.min.js"></script>
<!-- waypoint js -->
<script src="<?= $url ?>assets/js/waypoints.js"></script>
<!-- isotope js -->
<script src="<?= $url ?>assets/js/isotope.pkgd.min.js"></script>
<!-- stellar js -->
<script src="<?= $url ?>assets/js/jquery.stellar.min.js"></script>
<!-- magnific js -->
<script src="<?= $url ?>assets/js/magnific.min.js"></script>
<!-- venobox js -->
<script src="<?= $url ?>assets/js/venobox.min.js"></script>
<!-- meanmenu js -->
<script src="<?= $url ?>assets/js/jquery.meanmenu.js"></script>
<!-- Form validator js -->
<script src="<?= $url ?>assets/js/form-validator.min.js"></script>
<!-- plugins js -->
<script src="<?= $url ?>assets/js/plugins.js"></script>
<!-- main js -->
<script src="<?= $url ?>assets/js/main.js"></script>
<script>
    var url = 'https://wati-integration-prod-service.clare.ai/v2/watiWidget.js?270';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
        "enabled": true,
        "chatButtonSetting": {
            "backgroundColor": "#fafafa",
            "ctaText": "Chat with us",
            "borderRadius": "25",
            "marginLeft": "0",
            "marginRight": "20",
            "marginBottom": "20",
            "ctaIconWATI": false,
            "position": "left"
        },
        "brandSetting": {
            "brandName": "Kw Services",
            "brandSubTitle": "undefined",
            "brandImg": "<?= $url ?>uploads/settings/<?= $settinginfo["website_favicon"] ?>",
            "welcomeText": "Hi there!\nHow can I help you?",
            "messageText": "{{page_title}} Hello, %0A I have a question about {{page_link}}",
            "backgroundColor": "#fafafa",
            "ctaText": "Chat with us",
            "borderRadius": "25",
            "autoShow": false,
            "phoneNumber": "<?= str_replace(" ","",str_replace("+","",$settinginfo["website_phone"])) ?>"
        }
    };
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>
</body>

</html>