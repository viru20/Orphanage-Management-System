<!doctype html>

<?php
session_start();
include('secure/config.php'); 
 $qry1=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
$res1=mysqli_fetch_array($qry1);

if(isset($_REQUEST['submit']))
{
 $cpass=base64_encode($_REQUEST['cpassword']);
 $pass=base64_encode($_REQUEST['rpassword']);  
    mysqli_query($con,"update ".TABLE_PREFIX."user_master
            set
            password='".$pass."'
            where password='".$cpass."'
            and id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'

        ") or die(mysqli_error($con));
 $_SESSION["app_alert_message"]="Password has been updated successfully.";
}
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
      
        <!-- Hero End -->
        <!--?  Contact Area start  -->

       <!--  <script language="javascript">
function validation()
{
    with(document.frmcpass)
    {
        
            var error=0;
            var message;
            message="Please enter / correct folllowing errors to proceed further";
            message=message+ "\n" + "-------------------------------------------------------------";
            
            if(cpassword.value=="")
            {
                error=1;
                message=message + "\n" + "Please Enter Current Password";
            }
            
            if(npassword.value=="")
            {
                error=1;
                message=message + "\n" + "Please Enter New Password";
            }
 
             if(npassword.value!=rpassword.value)
            {
                error=1;
                message=message + "\n" + "Password not match!";
            }


            if(rpassword.value=="")
            {
                error=1;
                message=message + "\n" + "Please Confirm Password";
            }
                      
             <?php $cupass=base64_decode($res1['password']);?>
            if(cpassword.value!=='<?php echo $cupass; ?>')
            {
                error=1;
                message=message + "\n" + "Please enter valid Password";
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
                        <h1 class="contact-title" align="center">Change Password</h1>
                    </div>
                    <?php if($_SESSION["app_alert_message"]!=""){?>
                              <div class="col-12"> 
                              <center><strong style="color:green;"><?php echo $_SESSION["app_alert_message"];?></strong></center>
                              </div>  
                            </div>
                            <?php unset($_SESSION["app_alert_message"]); }?>   
                    <div class="col-lg-12">
                        <form class="form-contact contact_form" action="" method="post" name="frmcpass" id ="frmcpass">
                              
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control required" name="cpassword" id="cpassword" placeholder="Current Password" required/>
                             <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                               
                               <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="npassword" id="npassword" type="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'" placeholder="New Password" required>
                                    </div>
                                </div>

                               <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="rpassword" id="rpassword" type="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" placeholder="Confirm Password" required>
                                    </div>
                                </div>

                                 
                                

                            </div>
                            <div class="col-12">
                            <div class="form-group mt-3">
                                 <span id="wrn_msg" class="ml-4 text-danger"></span>
                            <span id="success_msg" class="ml-4 text-success"></span>
                                <input type="hidden" name="action" value="changepass">
                                <center><button type="button" class="btn" name="submit" id="btncpass" value="Submit">Submit</button></center>
                            </div>
                            </div>
                        </form>
                       
                    </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Area End -->
    </main>
</div>
    <?php
    include('footer.php');
    ?>