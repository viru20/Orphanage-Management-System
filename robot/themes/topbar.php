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
                                <img src="assets/images/logo-folded.png" alt="user-image" class="img-circle img-inline">
                                <span><?php echo $_SESSION[SESSION_PREFIX.'login_user_name']; ?> <i class="fa fa-angle-down"></i></span>
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