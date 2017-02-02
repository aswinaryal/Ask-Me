<?php
require('config/dbconfig.php');
require_once('registrationValidator.php');
require('head.php');
?>

<div align="center">
    <div class="register">
        <form  method="post" autocomplete="off">
            <label><h2>Register</h2></label>

            <input type="text" name="username" placeholder="Choose a username" id="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>">

            <p><?php if(isset($errors['username1'])) {
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo "    ".$errors['username1'];
                }
                ?>
            </p>
            <p><?php if(isset($errors['username2']) && empty($errors['username1'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo $errors['username2'];
                }
                ?>
            </p>

            <p><?php if(isset($errors['username3']) && empty($errors['username2'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo $errors['username3'];
                }
                ?>
            </p>

            <input type="password" name="password" placeholder="Choose a password" id="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];  ?>">
            <p><?php if(isset($errors['password1'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo $errors['password1'];
                }
                ?>
            </p>

            <p><?php if(isset($errors['password2']) && empty($errors['password1'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo $errors['password2'];
                }
                ?>
            </p>


            <input type="password" name="repassword" placeholder="Confirm password"id="repass" value="<?php if(isset($_POST['repassword'])) echo $_POST['repassword'];  ?>">
            <p><?php if(isset($errors['repassword1'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo $errors['repassword1'];
                }
                ?>
            </p>

            <p><?php if(isset($errors['repassword2']) && empty($errors['repassword1'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo $errors['repassword2'];
                }
                ?>
            </p>


            <input type="email" name="email" placeholder="Enter your Email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>">
            <p><?php if(isset($errors['email1'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo $errors['email1'];
                }
                ?>
            </p>
            <p><?php if(isset($errors['email2']) && empty($errors['email1'])){
                    echo '<img src="images/warning-sign.png" height="20" width="20" style="margin:auto; padding-right:5px;"/>';
                    echo $errors['email2'];
                }
                ?>
            </p>

            <input type="submit" name="submit" value="Continue" />

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


</body>
</html>
