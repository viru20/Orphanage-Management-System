<!doctype html>
<?php
session_start();
include('secure/config.php');
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
                                <h2>Adopt</h2>
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
                        <form class="form-contact contact_form" action="" method="post" name="frmadopt" id="frmadopt">
                            <div class="row">
                               <div class="col-12">
                                    <div class="form-group" style="padding-bottom:50px;">
                                       
                                       <select class="form-control" style="width: 100% !important;" name="cid" id="cid" required>
              <option value="">Select Children</option>
                       <?php
                       $qry_center=mysqli_query($con,"select *from ".TABLE_PREFIX."children_master where children_status=1 and children_is_deleted=0" );
                        while($qry_result=mysqli_fetch_array($qry_center))
                        {
                          ?>
                            <option value="<?php echo $qry_result['children_id']; ?>" <?php if($qry_result['children_id']==$_REQUEST['id']) { echo "selected"; } ?>><?php echo $qry_result['children_name']; ?></option>      
                          <?php
                        }
                      ?>
                    </select>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid required" name="job" id="job" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Job'" placeholder="Job">
                                    </div>
                                </div>
                               
                               
                               <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid required integer" name="salary" id="salary" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Salary'" placeholder="Salary" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        
                                        <input class="form-control valid required" name="img" id="img" type="file" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Job'" placeholder="img" >
                                        
                                    </div>
                                </div>
                                 
                                

                            </div>
                            <span id="wrn_msg" class="ml-4 text-danger"></span>
                            <span id="success_msg" class="ml-4 text-success"></span>
                            <div class="form-group mt-3">
                                <input type="hidden" name="action" value="adopt">
                                <center><button type="button" class="btn" name="submit" id="btnadopt" value="Submit" >Submit</button></center>

                            </div>
                        </form>
                       
                    </div>
                    
                        </div>
                    </div>
                

        <!-- Contact Area End -->
    </main>
</div>
    <?php
    include('count.php');
    include('footer.php');
    ?>