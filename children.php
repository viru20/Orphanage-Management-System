<?php
include('secure/config.php');
include('secure/function.php');
include('topheader.php');
   session_start();
   if($_SESSION[SESSION_PREFIX.'login-user-id']=="")
   {
    header('location:login');
   }
include('bottomheader.php');
?>
 
 <!-- body start -->

 <?php
 if($_REQUEST['search']!="")
 {
 $result=mysqli_query($con,"select *from orphanage_children_master where children_name like '".$_POST['search']."' and center_id='".$_REQUEST['id']."'");
 ?>
 <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-20 text-center">
                            <h2>Children Information</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST">
             <center>   
            <input type="text" name="search" style="height:52px; padding-left:10px; " size="30%"><br/><br/>
            <input type="submit" name="submit" value="Search" class="btn">
             </center>
             </form>
       <div class="our-cases-area section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span></span>
                        <h2></h2>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <?php
                while($row=mysqli_fetch_array($result))
                {
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cases mb-40">
                        <div class="cases-img" style="height: 400px;">
                            
                            <img src="<?php echo CHILDREN_IMAGE.$row['children_img'];?>" alt="" >
                        </div>
                        <div class="cases-caption">
                            <h3 style="max-width: 295px; overflow: hidden;"><a href="childrenprofile?id=<?php echo $row['children_id'];?>"><?php echo $row['children_name'];?></a></h3>
                            <div class="prices d-flex justify-content-between">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <center>
            <a href="children.php?id=<?php echo $_REQUEST['id']; ?>"><button class="btn" >Back</button></a>
            </center>
        </div>
    </div>
 <?php
 }
?> 
 <?php
 if(!$_REQUEST['search'])
 {
 $result=mysqli_query($con,"select *from orphanage_children_master where center_id='".$_REQUEST['id']."' and adopt=0");
 ?>
 <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-20 text-center">
                            <h2>Children Information</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <div class="our-cases-area section-padding30">
         <form action="" method="POST">
             <center>   
            <input type="text" name="search" style="height:52px; padding-left:10px; " size="30%"><br/><br/>
            <input type="submit" name="submit" value="Search" class="btn">
             </center>
             </form>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span></span>
                        <h2></h2>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <?php
                while($row=mysqli_fetch_array($result))
                {
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cases mb-40">
                        <div class="cases-img">
                            <img src="<?php echo CHILDREN_IMAGE.$row['children_img'];?>" alt="" height="200px;">
                        </div>
                        <div class="cases-caption">
                            <h3 style="max-width: 295px; overflow: hidden;"><a href="childrenprofile.php?id=<?php echo $row['children_id'];?>"><?php echo $row['children_name'];?></a></h3>
                            <div class="prices d-flex justify-content-between">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!--count down start -->
 
 <!-- count dow end -->
    <!--body end --> 
<?php
}
include('count.php');
include('footer.php');
?>
