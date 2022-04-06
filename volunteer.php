<!doctype html>
<?php
session_start();
include('secure/config.php');

if(isset($_REQUEST['submit']))
{
    mysqli_query($con,"insert into ".TABLE_PREFIX."volunteer_master
            set
           name='".$_REQUEST['name']."',
           gender='".$_REQUEST['gender']."',
           age='".$_REQUEST['age']."',
           email='".$_REQUEST['email']."',
           phone='".$_REQUEST['phone']."',
           country='".$_REQUEST['country']."',
           region='".$_REQUEST['region']."',
           city='".$_REQUEST['city']."',
           date='".$date."'
            

        ") or die(mysqli_error($con));
    
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
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-20 text-center">
                                <h2>Volunteer</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--?  Contact Area start  -->
       <!--  <script language="javascript">
function validation()
{
    with(document.frmadopt)
    {
        
            var error=0;
            var message;
            message="Please enter / correct folllowing errors to proceed further";
            message=message+ "\n" + "-------------------------------------------------------------";
            
            if(cid.value=="")
            {
                error=1;
                message=message + "\n" + "please select children";
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
                        <h1 class="contact-title" align="center"></h1>
                    </div>
                    <div class="col-lg-12">
                        <form class="form-contact contact_form" action="" method="post" name="frmvol" id="frmvol">
                            <div class="row">
                               
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="name" id="name" type="text" onfocus="this.placeholder = 'Name'" onblur="this.placeholder = 'Name'" placeholder="Name" required>
                                    </div>
                                </div>
                               
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="email" id="email" type="email" onfocus="this.placeholder = 'Email'" onblur="this.placeholder = 'Email'" placeholder="Email" required>
                                    </div>
                                </div>
                                  
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                          <select class="form-control valid" name="gender" id="gender" required>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                                    </div>
                                </div>
                                
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="Age" id="Age" type="number" onfocus="this.placeholder = 'Age'" onblur="this.placeholder = 'Age'" placeholder="Age" required>
                                    </div>
                                </div>

                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="phone" id="phone" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" placeholder="Phone" required>
                                    </div>
                                </div>
                                
                                 
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control valid" name="country" id="country" >
                       <option value="">Select Country</option>
                      <option value="1">India</option>
                      <option value="2">Usa</option>
                      <option value="3">Uk</option>
                      <option value="4">Pakistan</option>
                      <option value="5">srilanka</option> 
                    </select>
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                          <select class="form-control valid" name="region" id="region" >
                      <option value="">Select Region</option>
                      <option value="1">Gujarat</option>
                      <option value="2">Maharastra</option>
                      <option value="3">Up</option>
                      <option value="4">Bihar</option>
                      <option value="5">Utrakhand</option> 
                    </select>
                                    </div>
                                </div>
                            

                              <div class="col-sm-6" style="padding-bottom: 30px;">
                                    <div class="form-group">
                                         
                                        <select class="form-control valid" name="city" id="city" >
                      <option value="">Select City</option>
                      <option value="1">surat</option>
                      <option value="2">bhavnagar</option>
                      <option value="3">ahemdabad</option>
                      <option value="4">bardoli</option>
                      <option value="5">baroda</option> 
                    </select>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group mt-3">
                                <span id="wrn_msg" class="ml-4 text-danger"></span>
                            <span id="success_msg" class="ml-4 text-success"></span>
                                <input type="hidden" name="action" value="volunteer">
                                <center><button type="button" class="btn" name="btnvol" id="btnvol" value="Submit">Submit</button></center>
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
    include('count.php');
    include('footer.php');
    ?>