<?php  
session_start();
// cek session
if (!isset($_SESSION["login"])){
    header("location:user/landing.html");
}