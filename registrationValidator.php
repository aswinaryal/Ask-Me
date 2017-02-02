<?php
require_once("config/dbconfig.php");
error_reporting(1);

if(($_POST)){ //not empty
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $repass = filter_var($_POST['repassword'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $errors = array();



    //start validation
    if(empty($_POST['username'])){
        $errors['username1'] = "Please enter a username";
    }

    if(strlen($_POST['username']) <4){
        $errors['username2'] = "Please enter username atleast 4 characters long";
    }


    if(empty($_POST['password'])){
        $errors['password1'] = "Please enter a password";
    }

    if(strlen($_POST['password']) <4){
        $errors['password2'] = "Please enter password atleast 4 characters long";
    }


    if(empty($_POST['repassword'])){
        $errors['repassword1'] = "Please retype your password";
    }
    if($password !== $repass){
        $errors['repassword2'] = "Password do not match";
    }




    if(empty($_POST['email'])){
        $errors['email1'] = "Please enter your email address";
    }

    if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$email)){
        $errors['email2'] =  "Please Enter a valid email address";
    }


    //username availability validation

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

        $query = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");

        if(mysqli_num_rows($query) > 0){
            $errors['username3'] = "Username already exixts";
        }

    }



}
if(($_POST['submit'])){

    if(count($errors) == 0){
        $query = "INSERT INTO users(username,password,email,joinDate)VALUES('$username','$password','$email',now())";

        $result = mysqli_query($con,$query) or die(mysqli_error());
        if($query){
            header("Location:index.php");
        }else{
            echo "Failed to store data";
        }
    }
}






?>