 <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Orphanage</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<?php
include('secure/config.php');
?>

<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets\assets\fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets\assets\css/style.css">
    <style>
        .form-input
        {
            width: 100%;
        }
        .td
        {
          max-width: 300px;
        }
    </style>
     <!-- <script language="javascript">
function validation()
{
    with(document.frmreg)
    {
        
            var error=0;
            var message;
            message="Please enter / correct folllowing errors to proceed further";
            message=message+ "\n" + "-------------------------------------------------------------";
           <?php 
           include('secure/config.php');
            $qry=mysqli_query($con,"select *from orphanage_user_master");
            
            while($res=mysqli_fetch_array($qry))
            {
           ?> 
            if(username.value=="<?php echo $res['username']?>")
            {
                error=1;
                message=message + "\n" + "Username is already taken";
            }
            <?php
            }
            ?>
            if(password.value ==re_password.value)
            {
                error=1;
                message=message + "\n" + "Password is not match";
            }
            if(agree-term.value=="")
            {
                error=1;
                message=message + "\n" + "Agree terms and conditions";
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
<style>
    .td
    {
     padding-left:20px;
    }
</style>
<body>
    
    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container" style="width:1080px;">
                <div class="signup-content">
                    <form method="POST" name="frmreg" id="frmreg" class="signup-form" action="" enctype="multipart/form-data">
                        <h2 class="form-title">Create account</h2>
                        <?php if($_SESSION["app_alert_message1"]!=""){?>
                        <strong style="color:green"><?php echo $_SESSION["app_alert_message1"];?></strong>
                        <?php }?><table width="100%" align="center" class="tab">
                        <tr>
                        <td>    
                        <div class="form-group">
                            <input type="text" class="form-input required " name="name" id="name" placeholder="Your Name" size="30%" />
                        </div>
                        </td>
                        <td class="td">
                        <div class="form-group">
                            <input type="text" class="form-input required " name="username" id="username" placeholder="Username" />
                        </div>
                        </td>
                        </tr>
                        <tr>
                        <td>    
                        <div class="form-group">
                              <select class="form-input required " name="gender" id="gender" >
                      <option value="">Select Gender</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                        </div>
                        </td>
                        <td class="td">
                        <div class="form-group">
                            <input type="text" class="form-input required  mobilenumber" name="mono" id="mono" placeholder="Mobile Number" />
                        </div>
                        </td>
                        </tr><tr>
                        <td>    
                        <div class="form-group">
                            <input type="Date" class="form-input required " name="dob" id="dob" placeholder="Date Of Birth" />
                        </div>
                        </td>
                        <td class="td">
                        <div class="form-group">
                          
                    <select class="form-input required " name="country" id="country" style="width:100%;">
                      <option value="">Select Country</option>
                        <?php
                        $qry1=mysqli_query($con,"select *from country");
                        while($res=mysqli_fetch_array($qry1))
                        {
                        ?>
                          <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
                        <?php
                        }
                        ?> 
                    </select>
                
                        </div>
                        </td>
                        </tr><tr>
                        <td>    
                        <div class="form-group">
                    <select class="form-input required " name="region" id="region" >
                      <option value="">Select Region</option>
                          <?php
                          $qry=mysqli_query($con,"select *from states");
                          while($res=mysqli_fetch_array($qry))
                          {
                          ?>
                            <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
                          <?php
                          }
                          ?> 
                    </select>
                        </div>
                        </td>
                        <td class="td">
                        <div class="form-group">
                    
                      <input type="text" class="form-input required " name="city" id="city" placeholder="City" /> 
                    
                        </div>
                        </td>
                        </tr>
                    <tr>
                        <td>
                    <div class="form-group">
                            <input type="text" class="form-input required " name="address" id="address" placeholder="Address" />
                           
                        </div>
                   </td>
                   <td class="td">
                        <div class="form-group">
                            <input type="file" name="img" id="img" class="form-input required " ></input>
                        </div>
                    </td>
                    </tr>
                    <tr>
                    <td>   
                        <div class="form-group">
                            <input type="email" class="form-input required  " name="email" id="email" placeholder="Email" />
                            
                        </div>
                    </td>
                    <td class="td">

                        <div class="form-group">
                             <input type="password" class="form-input required " name="password" id="password" placeholder="Password" />
                             <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                    </td>
                </tr>
            </table>
                        <div class="form-group">
                            <input type="password" class="form-input required " name="re_password" id="re_password" placeholder="Repeat your password" />
                             <span toggle="#re_password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term "  />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                       
                       <div class="form-group">
                       <div class="row">
                       <div  class="col-md-12">
                        <span id="wrn_msg" class="ml-4 text-danger"></span>
                        <span id="success_msg" class="ml-4 text-success"></span>
                       </div>
                       </div>
                       </div>
                        <div class="form-group">
                            <input type="hidden" name="action" value="reg">
                            <button type="button" name="btnreg" id="btnreg" class="form-submit" value="Create Account"/>CREATE ACCOUNT</button>
                        </div>
                    </form>
                    <p class="loginhere">
                         Already have an account ? <a href="login" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets\assets\vendor/jquery/jquery.min.js"></script>
    <script src="assets\assets\js\main.js"></script>
  <!--   <script src="assets\js/main.js"></script> -->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>