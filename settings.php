<?php session_start();
error_reporting(1);
if(!isset($_SESSION['id'])) {
    include_once("index.php");
}else {
    include_once("config/dbconfig.php");
    ?>
    <?php include_once("menu.php");
    $pa = "active";
    ?>
    <?php
    $query = "select * from users where username='" . $_SESSION["username"] . "'";
    $sql = mysqli_query($con, $query);
    $rows = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_assoc($sql)) {
        $username = $row['username'];
        $email = $row['email'];
        $education = $row['education'];
        $workplace = $row['workplace'];
        $address = $row['address'];
        $intrests = $row['intrests'];
        $phone = $row['phone'];
        $profile_pic = $row['profile_pic'];
        $fullname = $row['fullname'];

        ?>
        <?php
        if ($_GET['action'] == 'cp') {

            echo "<form action='settings.php?action=cp' method='POST'><center>";
            echo "
                Current Password: <input type='text' name='curr_pass'><br />
                New Password:<input type='password' name='new_pass'><br />
                Re-type password:<input type='password' name='re_pass'><br />
                <input type='submit' name='change_pass'value='change'>
                
                
                ";


            if (isset($_POST['change_pass'])) {

                $cur_pass = $_POST['curr_pass'];
                $new_pass = $_POST['new_pass'];
                $re_pass = $_POST['re_pass'];


                $sql = "select * from users where username='" . $_SESSION["username"] . "'";
                $check = mysqli_query($con, $sql);
                $rows = mysqli_num_rows($check);
                while ($row = mysqli_fetch_assoc($check)) {
                    $get_pass = $row['password'];

                }
                if ($cur_pass == $get_pass) {
                    if (strlen($new_pass) >= 4) {
                        if ($re_pass == $new_pass) {
                            $query = "update users set password='" . $new_pass . "' where username='" . $_SESSION["username"] . "'";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                echo "password changed";
                            }
                        } else {
                            echo "New password do not match.";
                        }
                    } else {
                        echo "Your password must be at least 4 character long";
                    }

                } else {
                    echo "Your current password do not match with real password";
                }

            }

            echo "</form></center>";
        }

        if ($_GET['action'] == "ci") {
            echo '<form action="settings.php?action=ci" method="POST" enctype="multipart/form-data"> <center>
              <br />
              Available file extension:<b> .PNG .JPG .JPEG </b><br /><br />
              <input type="file" name="image"><br />
              <input type="submit" name="change_pic" value="Change">
              <br />
        ';

            if (isset($_POST['change_pic'])) {
                $errors = array();
                $allowed_e = array('png', 'jpg', 'jpeg');

                $file_name = $_FILES['image']['name'];

                $file_e = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $file_s = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];

                if (in_array($file_e, $allowed_e) === false) {
                    $errors[] = 'This file extension is not allowed.';
                }
                if ($file_s > 2097152) {
                    $errors[] = 'File must be under 2mb';
                }
                if (empty($errors)) {
                    move_uploaded_file($file_tmp, 'images/' . $file_name);
                    $image_up = 'images/' . $file_name;

                    $sql = "update users set profile_pic='" . $image_up . "' where username='" . $_SESSION["username"] . "' ";
                    if ($query = mysqli_query($con, $sql)) {
                        echo "Your profile picture has been changed.";
                    }

                } else {
                    foreach ($errors as $error) {
                        echo $error, '<br />';
                    }
                }

            }


            echo '</form></center>';

        }


        ?>



        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <table class="table">
                        <thead><b>Account</b></thead>
                        <tbody>
                        <tr>
                            <td><td><a href="#"><span class="glyphicon glyphicon-pencil"></span>Update Bio</a></td>
                            </td>
                        </tr>
                        <tr>
                            <td>  <td><a href='settings.php?action=cp'><span class="glyphicon glyphicon-wrench"></span>Change password</a><br/></td></td>
                        </tr>
                        <tr>
                            <td>
                            <td><a href='settings.php?action=ci'><span class="glyphicon glyphicon-user"></span>Change Profile Picture</a></td>
                            </td>
                        </tr>

                        <tr>
                            <td><td><a href="#"><span class="glyphicon glyphicon-pencil"></span>Update Information </a> </td>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>





        <?php
    }
}
