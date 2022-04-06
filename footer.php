<?php
require_once("secure/config.php");
require_once("secure/function.php");
session_start();
$qry=mysqli_query($con,"select *from config");
$res=mysqli_fetch_array($qry)
?>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Orphanage</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    </main>
        <footer>
        <div class="footer-wrapper section-bg2" data-background="assets/img/gallery/footer_bg.png">
            <!-- Footer Top-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contact Info</h4>
                                    <ul>
                                        <li>
                                            <p>Address :<?php echo $res['address'];?></p>
                                        </li>
                                   <?php
                                    
                                    ?>    
                                        <li>Phone:<?php echo $res['phone'];?></li>
                                        <li>Email:<?php echo $res['email'];?></li>
                                    <?php
                                    
                                    ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Important Link</h4>
                                    <ul>
                                        <li><a href="about">About Us</a></li>
                                        <li><a href="contact">Contact Us</a></li>
                                        <li><a href="adopt">Adopt</a></li>
                                        <li><a href="donation">Donation</a></li>
                                        <li><a href="volunteer">Volunteer</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Newsletter</h4>
                                    <div class="footer-pera footer-pera2">
<!--                                     <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p> -->
                                </div>
                                <!-- Form -->
                                <div class="footer-form" >
                                    <div id="mc_embed_signup">
                                        <form method="POST" action="" name="frmemail" id="frmemail">
                                            <input type="email" name="email" placeholder="Email Address"
                                            class="placeholder hide-on-focus email_validate" on  focus="this.placeholder = '"
                                          onblur="this.placeholder = ' Email Address '">
                                            <input type="hidden" name="action" value="email">
                                             <div class="form-icon">
                                                <button type="button" 
                                                class="email_icon newsletter-submit button-contactForm" name="btnemail" id="btnemail"><img src="assets/img/gallery/form.png" alt=""></button>
                                            </div><br/>
                                            <span id="wrn_msg1" class="ml-4 text-danger"></span>
                                            <span id="success_msg1" class="ml-4" style="max-width: 100%"></span>
                                        </form>
                                       <!--  <form  
                                        class="subscribe_form relative" name="frmemail" id="frmemail">
                                            <input type="email" name="email" placeholder="Email Address"
                                            class="placeholder hide-on-focus" onfocus="this.placeholder = '"
                                            onblur="this.placeholder = ' Email Address '">
                                            <input type="hidden" name="action" value="email">
                                            <div class="form-icon">
                                                <button type="button" 
                                                class="email_icon newsletter-submit button-contactForm" name="btnemail" id="btnemail"><img src="assets/img/gallery/form.png" alt=""></button>
                                            </div>
                                            </center>
                                        </form> -->
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-xl-10 col-lg-9 ">
                                <div class="footer-copy-right">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Project is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.ngpatelpoly.ac.in/" target="_blank">N.G.Patel Polytechnic</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-3">
                                <div class="footer-social f-right">
                                    <a href="<?php echo $res['twitter'];?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a  href="<?php echo $res['facebook'];?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="<?php echo $res['google'];?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->    
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>