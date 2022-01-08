<?php 

if (isset($_SESSION["login_admin"])){
    
    header('location:../admin/core/dashboard.php');
}