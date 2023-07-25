<?php
include_once "header.php";
?>
<!-- Start Bottom Header -->
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb">
                    <div class="section-headline white-headline text-center">
                        <h3>Contact us</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!-- Start contact Area -->
<div class="contact-page area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="contact-head">
                    <h3>Request a <span class="color">Contact us</span></h3>
                    <p>ConsultExprts The universal acceptance of bitcoin has given a tremendous opportunity for
                        merchants to do crossborder transactions instantly and at reduced cost.</p>
                    <div class="project-share">
                        <h5>Our Social Link :</h5>
                        <ul class="project-social">
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
            <!-- End contact icon -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="contact-form">
                    <div class="row">
                        <div id="alert"></div>
                        <form id="add" method="POST"  class="contact-form">
                            <input type="hidden" id="page" value="contact">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" name="email" class="email form-control" id="eemail" placeholder="Email" required data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="email form-control" id="ephone" placeholder="Phone" name="phone" required data-error="Please enter your phone">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="subject" id="msg_subject" class="form-control" placeholder="Subject" required data-error="Please enter your message subject">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea id="message" name="msg" rows="7" placeholder="Massage" class="form-control" required data-error="Write your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="submit" id="submit" class="contact-btn btn-sbmit">Submit</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End contact Form -->
        </div>
    </div>
</div>
<!-- Start contact Area -->
<div class="map-area-top">
    <div class="container-full">
        <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- Start Map -->
                <div class="map-area">
                    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Flate%2051%20building%201301%20Road%204526%20block%20345%20Al%C2%A0juffair+(Kw%20Services)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure area map</a></iframe></div>
                </div>
                <!-- End Map -->
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area -->
<?php
include_once "footer.php";
?>
<script>
    $("#add").on("submit", function(e) {
        e.preventDefault();
        var page = $("#page").val();
        $(".btn-sbmit").attr("disabled", "disabled");
        $.ajax({
            url: "<?=$url?>admin-area/include/insert.php?page=" + page,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(result) {
                //  alert(result);
                $(".btn-sbmit").removeAttr("disabled");
                if (result['res'] == "success") {
                    $("#alert").html(
                        '<div class="alert alert-success inverse alert-dismissible fade show" role="alert"><p><b> Well done! </b>Successfully Inserted.</p></div>'
                    );
                    $("#add").trigger("reset");
                    $("html, body").animate({
                            scrollTop: 0,
                        },
                        1000
                    );
                } else if (result['res'] == "fillform") {
                    $("#alert").html(
                        '<div class="alert alert-info inverse alert-dismissible fade show" role="alert"><p>Required All Fields</p></button></div>'
                    );
                    $("html, body").animate({
                            scrollTop: 0,
                        },
                        1000
                    );
                } else if (result['res'] == "format") {
                    $("html, body").animate({
                            scrollTop: 0,
                        },
                        1000
                    );
                    $("#alert").html(
                        '<div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down"></i><p>Incorrect Image Format</p></button></div>'
                    );
                }
            },
        });
    });
</script>