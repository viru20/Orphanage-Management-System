 <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

    <!-- USER INFO - START -->
    <div class="row">
     
    </div>
    <!-- USER INFO - END -->
    <ul class='wraplist'>	
     
        <li> 
            <a href="<?php echo HTTP_BASE_URL;?>">
                <i class="fa fa-dashboard"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>

       
        <li <?php if($_REQUEST["module"]=="3" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donation">
                <i class="fa fa-money"></i>
                <span class="title">Donation Details</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="5" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>children">
                <i class="fa fa-user"></i>
                <span class="title">Children Detail</span>
            </a>
        </li>

        
         <li <?php if($_REQUEST["module"]=="6" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>adopt">
                <i class="fa fa-building"></i>
                <span class="title">Adopt Detail</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="9" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donate">
                <i class="fa fa-building"></i>
                <span class="title">Donate Detail</span>
            </a>
        </li>
 
        <!-- <li <?php if($_REQUEST["module"]=="8" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>childrenreport">
                <i class="fa fa-list"></i>
                <span class="title">Children Report</span>
            </a>
        </li> -->

        <li <?php if($_REQUEST["module"]=="10" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>adoptreport">
                <i class="fa fa-list"></i>
                <span class="title">Adopt Report</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="11" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donatereport">
                <i class="fa fa-list"></i>
                <span class="title">Donate Report</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="7" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donationreport">
                <i class="fa fa-list"></i>
                <span class="title">Donation Report</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="13" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donationrequest">
                <i class="fa fa-list"></i>
                <?php 
                //  include('../secure/config.php');
                // $qry($con,"select *from ".TABLE_PREFIX."donation_master where payment_status=0 ");
                // $count=mysqli_nums_row($qry);
                ?>

                <span class="title">Donation Request<?php  ?></span>
            </a>
        </li>
        <li <?php if($_REQUEST["module"]=="12" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>adoptrequest">
                <i class="fa fa-list"></i>
                <span class="title">Adopt Request</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="14" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donaterequest">
                <i class="fa fa-list"></i>
                <span class="title">Donate Request</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="5" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>center">
                <i class="fa fa-user"></i>
                <span class="title">Center Profile</span>
            </a>
        </li>
    </ul>
 </div>