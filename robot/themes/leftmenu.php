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

         <li <?php if($_REQUEST["module"]=="4" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>user">
                <i class="fa fa-user"></i>
                <span class="title">User Detail</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="5" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>children">
                <i class="fa fa-user"></i>
                <span class="title">Children Detail</span>
            </a>
        </li>

         <li <?php if($_REQUEST["module"]=="6" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>center">
                <i class="fa fa-building"></i>
                <span class="title">Center Detail</span>
            </a>
        </li>
        
         <li <?php if($_REQUEST["module"]=="7" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>adopt">
                <i class="fa fa-building"></i>
                <span class="title">Adopt Detail</span>
            </a>
        </li>
  
        <li <?php if($_REQUEST["module"]=="9" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donate">
                <i class="fa fa-list"></i>
                <span class="title">Donate Details</span>
            </a>
        </li>
        <li <?php if($_REQUEST["module"]=="10" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>contact">
                <i class="fa fa-list"></i>
                <span class="title">Contact Details</span>
            </a>
        </li>
        <li <?php if($_REQUEST["module"]=="11" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>slider">
                <i class="fa fa-list"></i>
                <span class="title">Slider</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="8" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>report">
                <i class="fa fa-list"></i>
                <span class="title">User Report</span>
            </a>
        </li>
       
        

         <li <?php if($_REQUEST["module"]=="13" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>adoptreport">
                <i class="fa fa-list"></i>
                <span class="title">Adopt Report</span>
            </a>
        </li>

         <li <?php if($_REQUEST["module"]=="14" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donatereport">
                <i class="fa fa-list"></i>
                <span class="title">Donate Report</span>
            </a>
        </li>

         <li <?php if($_REQUEST["module"]=="15" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>donationreport">
                <i class="fa fa-list"></i>
                <span class="title">Donation Report</span>
            </a>
        </li>

        <li <?php if($_REQUEST["module"]=="15" ) {?> class="active" <?php } ?>> 
            <a href="<?php echo HTTP_BASE_URL;?>newslatter">
                <i class="fa fa-later"></i>
                <span class="title">Center News Latter</span>
            </a>
        </li>

    </ul>
 </div>