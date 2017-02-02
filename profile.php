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
        if($_GET['id'])
        {
            $check = "select * from users where id=".$_GET['id']." ";
            $result = mysqli_query($con,$check);
            $rows = mysqli_num_rows($result);
            if($rows !=0)
            {
                while($row = mysqli_fetch_assoc($result)) {
                    $username = $row['username'];
                    $email = $row['email'];
                    $education=$row['education'];
                    $workplace=$row['workplace'];
                    $address = $row['address'];
                    $intrests = $row['intrests'];
                    $phone = $row['phone'];
                    $profile_pic = $row['profile_pic'];
                    $fullname = $row['fullname'];



                }
            }
        }else {
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

            }
        }

    ?>





    <!-- profile Area -->

    <div class="col-md-offset-2 col-sm-9 col-md-6 col-lg-8">

        <div class="panel panel">
            <div class="panel-medium">

                    <div class="col-md-3">
                        <img src="<?=$profile_pic?>" class="img-circle" width="100%">

                    </div>

                    <div class="col-sm-3 col-md-6 col-lg-4">
                    <h4><u><?php echo $username ?></u></h4>
                        <p><i class="glyphicon glyphicon-heart"></i><?php echo $intrests ?></p>
                        <p><i class="glyphicon glyphicon-road"></i><?php echo $address ?></p>
                        <p><i class="glyphicon glyphicon-phone"></i><?php echo $phone ?></p>
                        <p><i class="glyphicon glyphicon-envelope"></i> <?php echo $email ?></p>

                    </div>


                    <div class="clearfix">
                    </div>

            </div>


        </div>


    </div>

    <div class="col-md-4">
        <div class="panel">
            <table>
                <thead>
                Feeds<hr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="profile.php?action=aa">Answers</a> </td>
                </tr>

                </tbody>
                <tbody>
                <tr>
                    <td><a href="profile.php?action=qa">Question Asked</a> </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>



    <?php
    if($_GET['action'] == "qa"){
        $sql = "select * from posts where post_creator='" . $_SESSION["username"] . "'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        if($result){



        while ($row = mysqli_fetch_assoc($result)){?>
            <div style="width:1000px;text-align: right; margin-left: 40%;">
            <div class="col-md-8">

                <div class="panel panel-default">

                        <table class="table ">

                            <tr>

                                <td><?php echo $row['post_content'];?></td>
                            </tr>
                            <br />
                            <input type="button" name="view" value="view" id="<?php echo $row['post_id']; ?>"
                                   class="btn btn-default btn-xm view_data" />
                            <button onclick="change_id(<?php echo $row['post_id'] ?>);" type="button" name="answer_button" data-target="#answer_data_Modal" data-toggle="modal" value="Answer" style="margin: 15px;" data-id="<?php echo $row['post_id']; ?>" id="<?php echo $row['post_id']; ?>"
                                    class="btn btn-default btn-xm answer_data">
                                <span class="glyphicon glyphicon-pencil"></span>
                                Answer</button>


                        </table>

                </div>

            </div>
            </div>

            <?php
        }


    }
}


    ?>

    <!--  <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>About Me</h4>
                <p>Most Incommunicative and disorganized person in the world.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">

        <div class="panel panel-default">
            <div class="panel-heading">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <th>Gender</th>
                            <td>Male</td>
                        </tr>
                        <tr>
                            <th>Marital Status</th>
                            <td>Single</td>
                        </tr>
                        <tr>
                            <th>Official Website</th>
                            <td>aswinaryal.com.np</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

-->


<?php
}
?>