<!doctype html>
<?php

include('secure/config.php');
session_start();
if($_SESSION[SESSION_PREFIX.'login-user-id']=="")
{
    header('location:login');
}

if($_REQUEST['submit'])
{
    
 
        
    $_SESSION["app_alert_message"]="Profile has been updated successfully.";
    
 // header('location:'.HTTP_BASE_URL); 
    
}
include('topheader.php');
include('bottomheader.php');
?>
<html class="no-js" lang="zxx">

    <!--? Preloader Start -->
    
    <!-- Preloader Start -->
    <head>
        <style>
        
        </style>
                               
    </head>
  
    <main>
        <!--? Hero Start -->
       
        <!-- Hero End -->
        <!--?  Contact Area start  -->
        <!--  <script language="javascript">
function validation()
{
    with(document.frmprofile)
    {
        
            var error=0;
            var message;
            message="Please enter / correct folllowing errors to proceed further";
            message=message+ "\n" + "-------------------------------------------------------------";
            
            <?php 
           include('secure/config.php');
            $qry=mysqli_query($con,"select *from orphanage_user_master");
            
            while($res=mysqli_fetch_array($qry))
            {
           ?> 
            if(username.value=="<?php echo $res['username']?>")
            {
                error=1;
                message=message + "\n" + "Username is already taken";
            }
            <?php
            }
            ?>

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
         <div style="padding:30px;padding-top:5%;">

                    <div class="col-lg-12">
                        <form class="form-contact contact_form" action="" method="post" name="frmprofile" id="frmprofile" enctype="multipart/form-data">
                            <div class="row">
                              <?php if($_SESSION["app_alert_message"]!=""){?>
                              <div class="col-12"> 
                              <center><strong style="color:green;"><?php echo $_SESSION["app_alert_message"];?></strong></center>
                              </div>  
                            </div>
                            <?php unset($_SESSION["app_alert_message"]); }?>   
                             <div class="col-12">
                                <h1 style="font-size:32px;padding-bottom:30px;"><b><center>Profile</center><b></h1>
                                </div>

                            <div class="row">
                                <div class="col-12">
                                    <?php 
                                     $qry1=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
                                        $res1=mysqli_fetch_array($qry1);
                                    ?>
                                    <center>
                                    <img src="<?php echo USER_IMAGE.$res1['image'];?>" height="200" width="200" style="margin-bottom:30px;margin-top:0px;border-radius: 50%;"></img></center>
                                </div>
                               <div class="col-12">
                                    <div class="form-group">
                                        
                                       
                                        <input type="file" name="img" id="img">
<!--                                         <button><label for="img" style="color: #000;"><i class="fa fa-upload"></i> Upload</label></button>
                                     -->
                                    </div>
                                </div>
                              
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h2>Name:</h2>
                                        <input class="form-control valid required" name="name" id="name" type="text" value="<?php echo $res1['name'];?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h2>Username:</h2>
                                        <input class="form-control valid required" name="username" id="username" type="text" value="<?php echo $res1['username'];?>">
                                    </div>
                                </div>
                                 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h2>Gender:</h2>
                                        <select class="form-control valid" name="gender" id="gender">
                                        <option value="1" <?php if($res1['gender']=="1"){ echo "selected";} ?>>Male</option>
                                        <option value="2" <?php if($res1['gender']=="2"){ echo "selected";} ?>>Female</option>
                                        </select> 
                                    </div>
                                </div>
                                 
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <h2>Mobile No:</h2>
                                        <input class="form-control valid mobilenumber" name="mo_no" id="mo_no" type="text" value="<?php echo $res1['mo_no'];?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h2>Date of Birth:</h2>
                                        <input class="form-control valid" name="dob" id="dob" type="date" value="<?php echo $res1['dob'];?>">
                                    </div>
                                </div>
 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h2>Email:</h2>
                                        <input class="form-control valid email_validate" name="email" id="email" type="email" value="<?php echo $res1['email'];?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group" style="padding-bottom: 50px;">
                                        <h2>Country:</h2>
                                         <select class="form-control valid " name="country" id="country">
                                           
                      <option value="">Select Country</option>
<?php
$qry1=mysqli_query($con,"select *from country");
while($res=mysqli_fetch_array($qry1))
{
?>
    <option value="<?php if($res['id'] == $res1['country']) {echo "selected";}?>"><?php echo $res['name']; ?></option>
<?php
}
?>
                    </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="height: 200px;overflow: auto;position: relative;">
                                    <div class="form-group">
                                        <h2>Region:</h2>
                                         <select class="form-control valid" name="region" id="region">
                   
<?php
$qry=mysqli_query($con,"select *from states");
while($res=mysqli_fetch_array($qry))
{
?>
    <option value="<?php echo $res['id']; ?>" style="max-height: 20px;"><?php echo $res['name']; ?></option>
<?php
}
?> 
                    </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h2>City:</h2>
                                        <input type="text" class="form-control required" name="city" id="city" placeholder="City" value="<?php echo $res1['city'];?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h2>Address:</h2>
                                        <textarea class="form-control valid required" name="address" id="address" type="text" rows="4" style=""><?php echo $res1['address'];?></textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group mt-3">
                                <span id="wrn_msg" class="ml-4 text-danger"></span>
                                <span id="success_msg" class="ml-4 text-success"></span>
                                <input type="hidden" name="action" value="profile">
                                <center><button type="button" class="btn" name="submit" id="btnprofile" value="Update" >Update</button></center>
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