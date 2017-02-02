<div class="table-responsive">
    <table class="table">
        <tr>
            <th width="100%"></th>


        </tr>
        <?php
        include_once("config/dbconfig.php");
        $query = "select * from posts  ORDER BY post_id DESC";
        $result = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
            <tr>
            <?php
            $post_creator = $row['post_creator'];
            $sql1 = "select * from users where username='" . $post_creator . "' ";
            $sql2 = mysqli_query($con, $sql1) or die(mysqli_error($con));
            while ($sql3 = mysqli_fetch_assoc($sql2)) {


                ?>
                <br/>
                <a href='profile.php?id=<?php echo $sql3['id']; ?>'><img src="<?php echo $sql3['profile_pic']; ?>" class="img-circle" width="5%">
                </a>
                <?php echo $row['post_content']; ?>

                <br/>


                <input type="button" name="view" value="view" data-target="#dataModel" data-toggle="modal" id="<?php echo $row['post_id']; ?>"
                       class="btn btn-default btn-xm view_data"/>
                <button onclick="change_id(<?php echo $row['post_id'] ?>);" type="button"
                        name="answer_button" data-target="#answer_data_Modal" data-toggle="modal"
                        value="Answer" style="margin: 15px;" data-id="<?php echo $row['post_id']; ?>"
                        id="<?php echo $row['post_id']; ?>"
                        class="btn btn-default btn-xm answer_data">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Answer
                </button>


                </tr>
                <?php echo "<hr/>";
            }
        }
        ?>


    </table>



</div>
