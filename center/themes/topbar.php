<div class='page-topbar '>
            <div class='logo-area'  align="center"></div>
            <div class='quick-area'>
                <div class='pull-left'>
                    <ul class="info-menu left-links list-inline list-unstyled">
                        <li class="sidebar-toggle-wrap">
                            <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>		
                <div class='pull-right'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                        <li class="profile">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <?php
                                $qry=mysqli_query($con,"select *from orphanage_center_master where center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");    
                                ?>
                                <img src="<?php 
                                while($res=mysqli_fetch_array($qry))
                                {
                                echo CENTER_IMAGE.$res['center_head_image'];
                                }
                                 ?>" style="border-radius:50%"></img>
                                <span><?php echo $_SESSION[SESSION_PREFIX.'login_center_name']; ?> <i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
                                <li <?php if($_REQUEST["module"]=="17") {?> class="open" <?php } ?>>
                                    <a href="<?php echo HTTP_BASE_URL;?>change-password">
                                        <i class="fa fa-wrench"></i>
                                        Change Pass.
                                    </a>
                                </li>
                              
                               
                                <li class="last">
                                    <a href="<?php echo HTTP_BASE_URL;?>logout">
                                        <i class="fa fa-lock"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="chat-toggle-wrapper">&nbsp;</li>
                        <li class="chat-toggle-wrapper">&nbsp;</li>
                         </ul>			
                </div>	
                <div>&nbsp;</div>	
            </div>

        </div>