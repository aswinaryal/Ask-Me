<?php
error_reporting(1);
include_once"login_validator.php";
include("head.php");
?>
<div align="center" xmlns="http://www.w3.org/1999/html">
    <div class="login">

        <form action="index.php" method="post" autocomplete="off">
            <label><h2>Login</h2></label>
            <input type="text" name="username" placeholder="Enter username"
                   value="<?php if(isset($_POST['username'])) echo $_POST['username'];  ?>"/>

            <p><?php if(isset($errors['username1'])) {
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;";/>';
                    echo "    ".$errors['username1'];
                }
                ?>
            </p>

            <p><?php if(isset($errors['invalidusername'])) {
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;";/>';
                    echo "    ".$errors['invalidusername'];
                }
                ?>
            </p>



            <p><?php if(empty($errors['invalidusername']) && empty($errors['invalidpassword']) && isset($errors['invalidcredential'])) {
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;";/>';
                    echo $errors['invalidcredential'];
                }
                ?>
            </p>




            <input type="password" name="password" placeholder="Enter password"
                   value="<?php if(isset($_POST['password'])) echo $_POST['password'];  ?>"/>
            <p><?php if(isset($errors['password1'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;";/>';
                    echo $errors['password1'];
                }
                ?>
            </p>

            <p><?php if(isset($errors['invalidpassword'])) {
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;";/>';
                    echo $errors['invalidpassword'];
                }
                ?>
            </p>

            <input type="checkbox">Remember Me</input>


            <input name="submit" type="submit" value="Login"/>
            <div class="forgot">
                <a href="#">Forgot Password?</a><br/><br/>
            </div>
            <div class="registerLink">
                Not a member yet? Register <a href="registrationform.php">here</a>
            </div>

            <div class="row">
                <hr><a href="#"> About</a>
                <a href="#"> Privacy</a>
                <a href="#"> Terms</a>
                <a href="#"> Sitemap</a>
                <a href="#"> Contact</a></hr>
            </div>
        </form>


    </div>
</div>


