 <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Orphanage</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<?php
session_start();
require_once("secure/config.php");
// if($_SESSION[SESSION_PREFIX.'login-user-id']!=="")
//    {
//    header("location:".HTTP_BASE_URL."");
//     exit();
// }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/assets/css/style.css">
</head>
<body>
  
    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container" style="width:60%">
                <div class="signup-content">
                    <form method="POST" id="frmlogin" name ="frmlogin" class="signup-form" action="<?php
                    echo "process.php"?>">
                 
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input required" name="username" id="username" placeholder="Your Username" style="width: 100%" />
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-input required" name="password" id="password" placeholder="Password" style="width: 100%"required/>
                             <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>

                        <div class="form-group" >
                         <span id="wrn_msg" class="ml-4 text-danger"></span>
                        </div>

                        <div class="form-group" >
                            <input type="hidden" name="action" value="login">
                            <button type="button" name="submit" id="btnlogin" class="form-submit" value="Login">Login</button>
                        </div>
                    </form>
                    
                  
                    <p style="text-align: center;">
                        Create an account ? <a href="Registration" class="loginhere-link">Click Here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="ckeditor.js"></script>
    <script src="assets/assets/js/main.js"></script>
</body>
</html>