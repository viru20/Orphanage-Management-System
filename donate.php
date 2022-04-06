<!doctype html>
<?php
session_start();
include('secure/config.php');
$qry=mysqli_query($con,"select *from ".TABLE_PREFIX."children_master where center_id='".$_REQUEST['cid']."'");
$res=mysqli_fetch_array($qry);
if(isset($_REQUEST['submit']))
{
    mysqli_query($con,"insert into ".TABLE_PREFIX."donate_master
            set
            user_id='".$_SESSION[SESSION_PREFIX.'login-user-id']."',
            center_id='".$_REQUEST['ceid']."',
            place='".$_REQUEST['place']."'

        ") or die(mysqli_error($con));
    ?>
           
            <?php
          $id=$_REQUEST['ceid'];
    header('location:info.php?id='.$_REQUEST['cid'].'');
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
                                <h2>Donate</h2>
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
                        <form class="form-contact contact_form" action="" method="post" name="frmdonate" id="frmdonate">
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
                                        <input class="form-control valid required" name="place" id="place" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Place where you get children'" placeholder="Place where you get children" required>
                                    </div>
                                </div>
                               
                              

                                 
                                

                            </div>
                            <div class="form-group mt-3">
                                 <span id="wrn_msg" class="ml-4 text-danger"></span>
                            <span id="success_msg" class="ml-4 text-success"></span>
                                <input type="hidden" name="action" value="donate">
                                <center><button type="button" class="btn" name="submit" id="btndonate" value="Submit" >Submit</button></center>
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