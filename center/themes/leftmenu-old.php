 <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="<?php echo HTTP_BASE_URL;?>">
                                <img src="data/profile/profile.png" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="<?php echo HTTP_BASE_URL;?>">Welcome</a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title">Admin</p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>	


                        <li> 
                            <a href="<?php echo HTTP_BASE_URL;?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                       
                        
                        <li> 
                            <a href="<?php echo HTTP_BASE_URL;?>department">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Department</span>
                                
                            </a>
                        </li> 

                        <li> 
                            <a href="<?php echo HTTP_BASE_URL;?>designation">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Designation</span>
                                
                            </a>
                        </li> 

                        <li> 
                            <a href="<?php echo HTTP_BASE_URL;?>employee">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Employee</span>
                                
                            </a>
                        </li> 

                        <li> 
                            <a href="<?php echo HTTP_BASE_URL;?>branch">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Branch</span>
                               
                            </a>
                        </li>  

                        <li <?php if($_REQUEST["module"]=="12" || $_REQUEST["module"]=="29") {?> class="open" <?php } ?>> 
                            <a href="javascript:;">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Client</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a <?php if($_REQUEST["module"]=="12") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>client">Client List</a>
                                </li>                        
                                <li>
                                    <a <?php if($_REQUEST["module"]=="29") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>client_type">Client Types</a>
                                </li> 
                            </ul>
                        </li>

                         <li <?php if($_REQUEST["module"]=="21" || $_REQUEST["module"]=="23" || $_REQUEST["module"]=="24") {?> class="open" <?php } ?>> 
                            <a href="javascript:;">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Target</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a <?php if($_REQUEST["module"]=="23") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>product">Product</a>
                                </li>                        
                                <li>
                                    <a <?php if($_REQUEST["module"]=="24") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>category">Category</a>
                                </li> 
                                <li>
                                    <a <?php if($_REQUEST["module"]=="21") {?> class="active" <?php } ?>href="<?php echo HTTP_BASE_URL;?>target">Employee Target</a>
                                </li>
                            </ul>
                        </li>

                        <li> 
                            <a href="<?php echo HTTP_BASE_URL;?>leads">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Leads Generation</span>
                                
                            </a>
                        </li>

                        <li> 
                            <a href="<?php echo HTTP_BASE_URL;?>task">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Task Management</span>
                               
                            </a>
                        </li>

                        <li <?php if($_REQUEST["module"]=="25" || $_REQUEST["module"]=="26") {?> class="open" <?php } ?>> 
                            <a href="javascript:;">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Attendance</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a <?php if($_REQUEST["module"]=="25") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>attendance">Add Attendance</a>
                                </li>                        
                                <li>
                                    <a <?php if($_REQUEST["module"]=="26") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>attendance_report">Attendance Report</a>
                                </li> 
                            </ul>
                        </li>

                        <li <?php if($_REQUEST["module"]=="20" || $_REQUEST["module"]=="27") {?> class="open" <?php } ?>> 
                            <a href="javascript:;">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Leave Mangement</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a <?php if($_REQUEST["module"]=="20") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>leave">Applications</a>
                                </li> 
                                <li>
                                    <a <?php if($_REQUEST["module"]=="27") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>leave_category">Leave Category</a>
                                </li>                       
                                
                            </ul>
                        </li>

                        <li <?php if($_REQUEST["module"]=="5" || $_REQUEST["module"]=="6" || $_REQUEST["module"]=="7" || 
                        $_REQUEST["module"]=="8" || $_REQUEST["module"]=="9" || $_REQUEST["module"]=="11" || $_REQUEST["module"]=="28"){?> class="open" 
                        <?php } ?>> 
                            <a href="javascript:;">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Basic Details</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a <?php if($_REQUEST["module"]=="5") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>notice">Notice Board</a>
                                </li>                        
                                <li>
                                    <a <?php if($_REQUEST["module"]=="6") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>vacancy">Vacancies</a>
                                </li>
                                <li>
                                    <a <?php if($_REQUEST["module"]=="7") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>policies">Policies</a>
                                </li>
                                <li>
                                   <a <?php if($_REQUEST["module"]=="8") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>blog">Blog </a>
                                </li>
                                <li>
                                    <a <?php if($_REQUEST["module"]=="9") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>contacts">Contact List</a>
                                </li>
                                <li>
                                    <a <?php if($_REQUEST["module"]=="11") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>holiday">List Of Holidays</a>
                                </li>
                                <li>
                                    <a <?php if($_REQUEST["module"]=="28") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>imp_dates">Personal Events</a>
                                </li>  
                            </ul>
                        </li>

                        <li <?php if($_REQUEST["module"]=="15" || $_REQUEST["module"]=="19" || $_REQUEST["module"]=="22" ){?> class="open" <?php } ?>> 
                            <a href="javascript:;">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Extra</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a <?php if($_REQUEST["module"]=="15") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>inquiry">Inquiry</a>
                                </li>                        
                                <li>
                                    <a <?php if($_REQUEST["module"]=="19") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>follow_up">Follow Up</a>
                                </li>
                                <li>
                                    <a <?php if($_REQUEST["module"]=="22") {?> class="active" <?php } ?> href="<?php echo HTTP_BASE_URL;?>resume">Resumes</a>
                                </li>
                               
                            </ul>
                        </li>

                            
                         
 
                         
                       
                    </ul>

 </div>