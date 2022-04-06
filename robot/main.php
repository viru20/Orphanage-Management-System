<style>

</style>
<section id="main-content" class="">
                <section class="wrapper" style='margin-top:100px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title" style="color: rgb(81, 120, 169) !important;position:absolute;top:-40px;padding-left:30px;">WelCome to Orphanage admin panel</h1>   
                                  
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
<?php 
// Query for adopt


$queryadopt=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-01-01' and '2021-01-31' ");
$adopt=mysqli_num_rows($queryadopt);

$queryadopt1=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-02-01' and '2021-02-28' ");
$adopt1=mysqli_num_rows($queryadopt1);

$queryadopt2=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-03-01' and '2021-03-31' ");
$adopt2=mysqli_num_rows($queryadopt2);

$queryadopt3=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-04-01' and '2021-04-30' ");
$adopt3=mysqli_num_rows($queryadopt3);

$queryadopt4=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-05-01' and '2021-05-31'");
$adopt4=mysqli_num_rows($queryadopt4);

$queryadopt5=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-06-01' and '2021-06-30' ");
$adopt5=mysqli_num_rows($queryadopt5);

$queryadopt6=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-07-01' and '2021-07-31' ");
$adopt6=mysqli_num_rows($queryadopt6);

$queryadopt7=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-08-01' and '2021-08-31' ");
$adopt7=mysqli_num_rows($queryadopt7);

$queryadopt8=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-09-01' and '2021-09-30' ");
$adopt8=mysqli_num_rows($queryadopt8);

$queryadopt9=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-10-01' and '2021-10-31' ");
$adopt9=mysqli_num_rows($queryadopt9);

$queryadopt10=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-11-01' and '2021-11-30' ");
$adopt10=mysqli_num_rows($queryadopt10);

$queryadopt11=mysqli_query($con,"select * from orphanage_adopt_master where  ADOPT_STATUS=1 and DATE between '2021-12-01' and '2021-12-31' ");
$adopt11=mysqli_num_rows($queryadopt11);



// Query for donate

$querydonate=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-01-01' and '2021-01-31' ");
$donate=mysqli_num_rows($querydonate);

$querydonate1=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-02-01' and '2021-02-28' ");
$donate1=mysqli_num_rows($querydonate1);

$querydonate2=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-03-01' and '2021-03-31' ");
$donate2=mysqli_num_rows($querydonate2);

$querydonate3=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-04-01' and '2021-04-30' ");
$donate3=mysqli_num_rows($querydonate3);

$querydonate4=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-05-01' and '2021-05-31'");
$donate4=mysqli_num_rows($querydonate4);

$querydonate5=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-06-01' and '2021-06-30' ");
$donate5=mysqli_num_rows($querydonate5);

$querydonate6=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-07-01' and '2021-07-31' ");
$donate6=mysqli_num_rows($querydonate6);

$querydonate7=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-08-01' and '2021-08-31' ");
$donate7=mysqli_num_rows($querydonate7);

$querydonate8=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-09-01' and '2021-09-30' ");
$donate8=mysqli_num_rows($querydonate8);

$querydonate9=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-10-01' and '2021-10-31' ");
$donate9=mysqli_num_rows($querydonate9);

$querydonate10=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-11-01' and '2021-11-30' ");
$donate10=mysqli_num_rows($querydonate10);

$querydonate11=mysqli_query($con,"select * from orphanage_donate_master where  donate_status=1 and date between '2021-12-01' and '2021-12-31' ");
$donate11=mysqli_num_rows($querydonate11);

?>
      <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Adopt','Donate'],
          ['Jan',<?php echo $adopt;?>,<?php echo $donate;?> ],
          ['Feb',<?php echo $adopt1;?>,<?php echo $donate1;?> ],
          ['Mar',<?php echo $adopt2;?>,<?php echo $donate2;?> ],
          ['Apr',<?php echo $adopt3;?>,<?php echo $donate3;?> ],
          ['May',<?php echo $adopt4;?>,<?php echo $donate4;?> ],
          ['Jun',<?php echo $adopt5;?>,<?php echo $donate5;?> ],
          ['July',<?php echo $adopt6;?>,<?php echo $donate6;?> ],
          ['Aug',<?php echo $adopt7;?>,<?php echo $donate7;?> ],
          ['Sep',<?php echo $adopt8;?>,<?php echo $donate8;?> ],
          ['Oct',<?php echo $adopt9;?>,<?php echo $donate9;?> ],
          ['Nov',<?php echo $adopt10;?>,<?php echo $donate10;?> ],
          ['Dec',<?php echo $adopt11;?>,<?php echo $donate11;?> ]
          
        ]);

        var options = {
          title: 'Orphanage Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
                   

    </script>
  </head>
  <body>
    <?php
    include('secure/config.php');
$qry=mysqli_query($con,"select SUM(amount) as total from ".TABLE_PREFIX."donation_master where payment_status='1'");
$donation=mysqli_fetch_array($qry);

$qryadopt=mysqli_query($con,"select * from orphanage_adopt_master where ADOPT_STATUS='1'");
$adopt=mysqli_num_rows($qryadopt);
$qrydonate=mysqli_query($con,"select * from orphanage_donate_master where donate_status='1'");
$donate=mysqli_num_rows($qrydonate);

$qryvolunteer=mysqli_query($con,"select * from orphanage_volunteer_master where vol_status='1'");
$volunteer=mysqli_num_rows($qryvolunteer);
    
$qryuser=mysqli_query($con,"select * from orphanage_user_master where user_status='1'");
$user=mysqli_num_rows($qryuser);

$qrycenter=mysqli_query($con,"select * from orphanage_center_master where center_status='1'");
$center=mysqli_num_rows($qrycenter);

$qrychildren=mysqli_query($con,"select * from orphanage_children_master where children_status='1'");
$children=mysqli_num_rows($qrychildren);

    ?>
     <div class="row">
      <div class="col-md-12">
        <div class="col-md-4">
            <div class="col-md-12">

               <div class="col-md-6" >
               <div class="tile-counter bg-orange">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $children;?>"></h2>
                <div class="clearfix"></div>
                <span>Children</span>
              </div>
              </div>
              </div>


              <div class="col-md-6">
               <div class="tile-counter bg-orange">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $center;?>"></h2>
                <div class="clearfix"></div>
                <span>Center</span>
              </div>
              </div>
              </div>
             

              <div class="col-md-6" style="margin-top: 40px;">
               <div class="tile-counter bg-primary">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $volunteer;?>"></h2>
                <div class="clearfix"></div>
                <span>Volunteer</span>
              </div>
              </div>
              </div>

              <div class="col-md-6" >
               <div class="tile-counter bg-primary" style="margin-top: 40px;">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $adopt;?>"></h2>
                <div class="clearfix"></div>
                <span>Adoption</span>
              </div>
              </div>
              </div>


              <div class="col-md-6" style="margin-top: 40px;">
               <div class="tile-counter bg-warning">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $donate;?>"></h2>
                <div class="clearfix"></div>
                <span>Donate</span>
              </div>
              </div>
              </div>


              <div class="col-md-6" style="margin-top: 40px;">
               <div class="tile-counter bg-warning">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $user;?>"></h2>
                <div class="clearfix"></div>
                <span>User</span>
              </div>
              </div>
              </div>
              
              <div class="col-md-12" style="margin-top: 40px;">
               <div class="tile-counter bg-purple">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $donation['total'];?>"></h2>
                <div class="clearfix"></div>
                <span>Donation</span>
              </div>
              </div>
              </div>

            </div>
        </div>
        <div class="col-md-6">
        <div id="curve_chart" style="width:690px; height:440px;"></div> 
        </div>  
      </div>  
    <div> 
    
  </body>               
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
<script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="assets/plugins/count-to/countto.js" type="text/javascript"></script> 
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


<!-- CORE TEMPLATE JS - START --> 
<script src="assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 

<!-- Sidebar Graph - START --> 
<script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/js/chart-sparkline.js" type="text/javascript"></script> 
<!-- Sidebar Graph - END --> 


<!--TABLE JS --> 
<script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- FUCTIONS -->          
<?php 
$year=date('Y');
$month=date('m');
$date=date('d');
?>

<link rel="stylesheet" type="text/css" href="scripts/datetime/jquery.datetimepicker.css"/>

<script src="scripts/datetime/jquery.datetimepicker.js"></script>
<script>
$('#txtdatefrom').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
startDate:  '<?php echo $year; ?>-<?php echo $month; ?>-<?php echo $date; ?>'

});

$('#txtdateto').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
startDate:  '<?php echo $year; ?>-<?php echo $month; ?>-<?php echo $date; ?>'

});
</script>    

                    </div> <!-- End .row -->

                </div>
            </section>
        </div>



                </section>
            </section>
      
      <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
      
      <script src="<?php echo HTTP_BASE_URL;?>assets/plugins/count-to/countto.js" type="text/javascript"></script> 
    <script type="text/javascript">
function view_more()
{
  //alert("hii");
  var fromdate=$('#txtdatefrom').val();
  var todate=$('#txtdateto').val();
  $('#btnsearch').hide();
  var dataString = 'txtdatefrom='+ fromdate +'&txtdateto='+ todate;
    $.ajax({
   type: "POST",
   url: "<?php echo HTTP_BASE_URL;?>process.php?action=actn_table",
   data: dataString,
   cache: false,
   success: function(result){
    $('#tbl_data').html(result);
     $('#btnsearch').show();
    }
  });
}
</script>
  


    