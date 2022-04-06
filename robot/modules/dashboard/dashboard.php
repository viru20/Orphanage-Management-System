


<section id="" class=" ">
                <section class="wrapper" style='margin-top:100px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Dashboard</h1>                      
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"><?php //echo $_SESSION["db_id"]; ?></div>


                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">
                                <div class="row">

                                 



                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <div >
                                           
                                           

                                            <div id="db_morris_line_graph" style="height:272px;width:95%;display:none;" ></div>
                                            <div id="db_morris_area_graph" style="height:272px;width:90%;display:none;"></div>
                                            <div id="db_morris_bar_graph" style="height:272px;width:90%;display:none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                    
                                       

                                    </div>

                                </div> <!-- End .row -->


                                <div class="row">
                                   

                                    <div class="col-md-4 col-sm-12 col-xs-12" style="display:none;">
                                        <div class="r2_graph1 db_box">



                                            <form id="rickshaw_side_panel">
                                                <section><div id="legend"></div></section>
                                                <section>
                                                  
                                                </section>
                                                <section>
                                                 
                                                   
                                                </section>
                                            </form>

                                            <div id="chart_container" class="rickshaw_ext" style="display:none;">
                                                <div id="chart" style="display:none;"></div>
                                                <div id="timeline"  style="display:none;"></div>
                                            </div>

                                            <div id='rickshaw_side_panel' class="rickshaw_sliders">
                                             
                                                <section>
                                                    <h5>Preview Range</h5>
                                                    <div id="preview" class="rickshaw_ext_preview"></div>
                                                </section>
                                            </div>

                                        </div>
                                        <!-- 
                                                                        <div class="r2_counter1 db_box">
                                                                                counter 1
                                                                        </div>
                                        
                                                                        <div class="r2_counter2 db_box">
                                                                                counter 2
                                                                        </div> -->

                                    </div>      

                                </div> <!-- End .row -->


                            </div>
                        </section></div>



                </section>
            </section>


        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

           
        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 
