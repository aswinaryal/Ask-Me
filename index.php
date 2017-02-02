<?php session_start();
if(!isset($_SESSION['id'])) {
    include "login_form.php";
}else{
    include("home.php");
    exit;
}

