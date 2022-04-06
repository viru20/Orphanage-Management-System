<!doctype html>
<?php

include('topheader.php');
?>
 <?php
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
?>
<html class="no-js" lang="zxx">

    <!--? Preloader Start -->
    
    <!-- Preloader Start -->
  
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-20 text-center">
                                <h2>Donation</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--?  Contact Area start  -->
        <!-- <script language="javascript">
function validation()
{
    with(document.frmdontion)
    {
        
            var error=0;
            var message;
            message="Please enter / correct folllowing errors to proceed further";
            message=message+ "\n" + "-------------------------------------------------------------";
            
            if(ceid.value=="")
            {
                error=1;
                message=message + "\n" + "please select center";
            }
            
             if(method.value=="")
            {
                error=1;
                message=message + "\n" + "please select payment method";
            }

            if (error==1)
            {
                alert(message);
                return false;
            }
            else
            {
                return true;        
            }
    }
}
</script> -->
        <div style="padding: 30px;padding-top:7%;">
                <div class="row">
                    <div class="col-12">
                        <h1 class="contact-title" align="center">Get in Touch</h1>
                    </div>
                    <div class="col-lg-12">
                        <form class="form-contact contact_form" action="" method="post" name="frmdonation" id="frmdonation">
                            <div class="row">
                               <div class="col-12">
                                    <div class="form-group" style="padding-bottom:50px;">
                                        
                                       <select class="form-control " width="100%" name="ceid" style="width: 100% !important;" id="ceid" required>
                                            <option value="">Select Center</option>
                                              <?php
                                               $qry_center=mysqli_query($con,"select center_id,center_name from ".TABLE_PREFIX."center_master where center_status=1 and center_is_deleted=0");
                                                while($qry_result=mysqli_fetch_array($qry_center))
                                                {
                                                  ?>
                                                    <option value="<?php echo $qry_result['center_id'];  ?>"><?php echo $qry_result['center_name']; ?></option>      
                                                  <?php
                                                }
                                              ?>
                      
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="amount" id="amount" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Amount'" placeholder="Enter Amount" required>
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message" width="100%"></textarea>
                                    </div>
                                </div>
                                

                            </div>
                             <span id="wrn_msg" class="ml-4 text-danger"></span>
                            <span id="success_msg" class="ml-4 text-success"></span></center>
                            <div class="form-group mt-3">
                                <input type="hidden" name="action" value="donation">
                                <center><button type="button" class="btn" name="submit" id="btndonation" value="Submit">Submit</button></center>
                            </div>
                        </form>
                       
                    </div>
                </div>
        </div>
                
        <!-- Contact Area End -->
    </main>
    <?php
    include('count.php');
    include('footer.php');
    ?>