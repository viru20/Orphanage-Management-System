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

    <!-- preloader -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loader1.png" alt="">
                </div>
            </div>
        </div>
    </div>   
    <!-- preloader -->
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
    <link rel="stylesheet" href="assets/css/style.css">
<div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                
                                <div class="header-info-left d-flex">
                                    
                                    <ul> 

                                    <?php
                                    ?>    
                                        <li>Phone:<?php echo $res['phone'];?></li>
                                        <li>Email:<?php echo $res['email'];?></li>
                                    </ul>
                                    <div class="header-social">    
                                        <ul>
                                            <li><a href="<?php echo $res['twitter'];?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a  href="<?php echo $res['facebook'];?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="<?php echo $res['linkin'];?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li> <a href="<?php echo $res['google'];?>"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="header-info-right d-flex align-items-center">
                                    <div class="select-this">
                                       

                                    

                                    <?php
                                    if($_SESSION[SESSION_PREFIX.'login-user-name']!="")
                                       { 
                                        $qry1=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
                                        $res1=mysqli_fetch_array($qry1);
                                     ?>

                                      <div class="">
                                        <a class=" btn-block dropdown-toggle" data-toggle="dropdown"><img src="<?php echo USER_IMAGE.$res1['image'];?>" height="30px" width="30px" style="border-radius:50%;"></img><b>
                                          <?php echo $_SESSION[SESSION_PREFIX.'login-user-name'];?></b></a>
                                        
                                        <div class="dropdown-menu" style="font-size:16px;width:185px;line-height:35px;">
                                          <a class="dropdown-item" href="profile" style="color:;"><i class="fas fa-user"></i><span style="padding-left:8px;">Profile</span></a>
                                          <a class="dropdown-item" href="changepassword"><i class="fas fa-key"></i><span style="padding-left:8px;">Change Password</span></a>
                                          <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i><span style="padding-left:8px;">Logout</span></a>
                                          <!-- <a class="dropdown-item" href="#">Link 3</a> -->
                                        </div>
                                      </div>
                                       
                                    <ul class="contact-now">  
                                              
                                        

                                     <!-- <li><a href="logout.php" style="color:#002d5b;">Logout</a>    </li> -->    
                                        </ul>    
                                   
                                     <?php
                                     }
                                      else
                                       { 
                                        ?>
                                      
                                     <ul class="contact-now"> 
                                    <li><a href="<?php echo HTTP_BASE_URL."login";?>" style="color:#002d5b;">Login</a></li>

                                     </ul>
                                       <?php
                                       }
                                   
                                     ?>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <?php 

?>