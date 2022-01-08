<?php 
session_start();
if (!isset($_SESSION["login_admin"])){

    header('location:../../user/landing.php');
}