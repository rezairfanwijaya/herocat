<?php  
session_start();
// cek session
if (!isset($_SESSION["login_user"])){
    header("location:user/landing.html");
}