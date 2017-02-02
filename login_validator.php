<?php
session_start();
require_once("config/dbconfig.php");
error_reporting(1);
if($_POST['submit']){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $errors = array();

    //start validation
    if(empty($_POST['username'])){
        $errors['username1'] = "Please enter a username";
    }
    if(empty($_POST['password'])){
        $errors['password1'] = "Please enter a password";
    }
    if($username && $password){
        $sql = "SELECT * FROM users WHERE username='".$username."' LIMIT 1";
        $result = mysqli_query($con,$sql) or die(mysqli_error);
        if(mysqli_num_rows($result) == 1){
            $errors['invalidpassword'] = "Please enter valid password";
        }
    }
    if($username && $password){
        $sql = "SELECT * FROM users WHERE password='".$password."' LIMIT 1";
        $result = mysqli_query($con,$sql) or die(mysqli_error);
        if(mysqli_num_rows($result) == 1){
            $errors['invalidusername'] = "Please enter valid username";
        }
    }
    if($username && $password){
        $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
        $result = mysqli_query($con,$sql) or die(mysqli_error);
        if(mysqli_num_rows($result) == 0){
            $errors['invalidcredential'] = "Please enter valid username and password";
        }
    }


    if($_POST['submit']){
        if($username && $password){
            $sql = "SELECT * FROM users WHERE username='".$username."' AND password = '".$password."' LIMIT 1";
            $result = mysqli_query($con,$sql) or die(mysqli_error);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("Location:index.php");
                exit();
            }
        }
    }



}


?>