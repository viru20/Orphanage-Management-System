<?php
include('secure/config.php');
include('topheader.php');
?>
 <?php
   session_start();
   if($_SESSION[SESSION_PREFIX.'login-user-id']=="")
   {
    header('location:login');
   }
   ?>
   <?php
include('bottomheader.php');
if($_SESSION[SESSION_PREFIX.'login-user-id']=="")
{
    header('location:login');
}
$qry=mysqli_query($con,"select *from ".TABLE_PREFIX."center_master where center_id='".$_REQUEST['id']."'");
?>
<main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-20 text-center">
                                <?php
                                while($res=mysqli_fetch_array($qry))
                                {
                                ?>
                                <h3 style="color:green; font-size:28px;">Your request is sent to center  successfully.</h3>
                                <h3>We Will Contact You In 24 Hours.</h3>
                                <br />
                                <h3>If You Have Any Query Than Contact Us.</h3><br/>
                                <h1>Phone no:- <?php echo $res['center_mo_no'];?></h1>
                                <h1>Email:- <?php echo $res['email'];?></h1>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<?php
include('footer.php');
?>