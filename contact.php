<!doctype html>
<?php
session_start();

if(isset($_REQUEST['submit']))
{
    mysqli_query($con,"insert into ".TABLE_PREFIX."contact_master
            set
            name='".$_REQUEST['name']."',
            email='".$_REQUEST['email']."',
            phone='".$_REQUEST['phone']."'.
            message='".$_REQUEST['message']."'

        ") or die(mysqli_error($con));
    ?>
           
            <?php
          $id=$_REQUEST['ceid'];
    header('location:info.php?id='.$_REQUEST['cid'].'');
}
include('topheader.php');
?>
 
   <?php
include('bottomheader.php');

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
                                <h2>Contact</h2>
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
                        <h1 class="contact-title" align="center">Get in Touch</h1>
                    </div>
                    <div class="col-lg-12">
                        <form class="form-contact contact_form" action="" method="post" name="frmcontact" id="frmcontact">
                            <div class="row">
                               <div class="col-12">
                                    <div class="form-group" style="">
                                       <input class="form-control valid required" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" placeholder="Name" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="phone" id="phone" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone No.'" placeholder="Phone No." required>
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder="Email" required>
                                    </div>
                                </div>
                               
                               <div class="col-12">
                                    <div class="form-group">
                                       <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message" width="100%"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mt-3">
                                <span id="wrn_msg" class="ml-4 text-danger"></span>
                            <span id="success_msg" class="ml-4 text-success"></span>
                                <input type="hidden" name="action" value="contact">
                                <center><button type="button" class="btn" name="btncontact" id="btncontact" value="Submit">Submit</button></center>
                            </div>
                        </form>
                       
                    </div>
                    
                        </div>
                    </div>

                    <div class="row" style="padding-bottom: 50px;">
                        <div class="col-md-12">
                        <center><div class="map"><?php echo $res['map'];?></div></center>
                        </div>
                    </div>
             
        <!-- Contact Area End -->
    </main>
</div>
    <?php
    include('count.php');
    include('footer.php');
    ?>