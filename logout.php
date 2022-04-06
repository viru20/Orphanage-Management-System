<?php
session_start();
require_once("secure/config.php");


unset($_SESSION[SESSION_PREFIX.'login-user-id']);
unset($_SESSION[SESSION_PREFIX.'login-user-name']);
session_destroy();
header('location:'.HTTP_BASE_URL.'');
exit;
?>