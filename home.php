<?php
    if(!isset($_SESSION['id'])) {
        include_once("index.php");
    }else{
        include_once("config/dbconfig.php");
        include_once("menu.php");
        $ha = "active";
?>


<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Ask-Me</title>
    <script src="js/script.js" type="text/javascript"></script>
</head>
    <body>
        <div class="container" id="container" style="margin-left: 170px;"><br /><br />
            <h4>Recent Posts</h4>
                <div id="question_table">
                        <?php
                        $query = "SELECT * FROM posts ORDER BY post_id DESC";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                        while($row = mysqli_fetch_assoc($result)){

                        $post_creator = $row['post_creator'];
                        $sql1 = "select * from users where username='".$post_creator."' ";
                        $sql2 = mysqli_query($con, $sql1) or die(mysqli_error($con));
                        while ($sql3 = mysqli_fetch_assoc($sql2)) {?><br/>




                            <div class="my-div view_data" id="<?php echo $row['post_id'];?>" data-target="#dataModal" data-toggle="modal">

                                <p style="color: #8d8e96;">Question Asked At:
                                <?php echo $row['posted_date'] ?></p>
                                <a href="#" class="fill-div" >
                                    <a href="profile.php?id=<?php echo $row['user_id']?>" style="cursor: pointer;">
                                        <img src="<?php echo $sql3['profile_pic']; ?>"class="img-circle" width="5%" style="margin-right: 10px;"></a>
                                    <?php echo $sql3['username'].', '.$sql3['bio']  ;?>


                                   <h4> <?php echo $row['post_content']; ?></h4>
                                </a><br />
                                <div>

                                    <?php
                                    $post_id = $row['post_id'];
                                    $sql4 = "select response_content from response where post_id =$post_id LIMIT 1";
                                    $sql5 = mysqli_query($con,$sql4);
                                    $sql6 = mysqli_fetch_assoc($sql5);
                                    // strip tags to avoid breaking any html
                                    $string = $sql6['response_content'];
                                    $displayString = strip_tags($string);
                                    if(strlen($displayString) == 0){
                                        echo "This Question has not any reply yet, Be the first to respond.";
                                    }

                                    if (strlen($displayString) > 200) {

                                        // truncate string
                                        $stringCut = substr($displayString, 0, 300);

                                        // make sure it ends in a word so assassinate doesn't become ass...
                                        $displayString = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....
                                        <a href="#">Read More</a>';
                                    }
                                    echo $displayString; ?>
                                </div>



                                <br>


                                <button onclick="change_id(<?php echo $row['post_id'] ?>);" type="button" name="answer_button" data-target="#answer_data_Modal" data-toggle="modal"
                                        value="Answer" data-id="<?php echo $row['post_id']; ?>"
                                        id="<?php echo $row['post_id']; ?>"
                                        class="btn btn-default btn-xm answer_data">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Answer</button>




                            </div>




                            <?php
                            }
                        }
                        ?>


                        <br/>


                </div>
            </div>






<!-- Modal opened after clicking View button -->

<div id="dataModal" class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body" id="post_detail" style="font-family: 'Times New Roman';" >


            </div>

        </div>
    </div>
</div>


        <div id="singleReplyModal" class="modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body" id="singleAnswer" style="font-family: 'Times New Roman';" >
                        Single Reply modal


                    </div>

                </div>
            </div>
        </div>
<!-- Modal to be opened after clicking Answer button -->


<div id="answer_data_Modal" class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body" id="answer_detail">

                <form method="post" id="answer_form">

                    <label>Add Your Reply</label>
                    <textarea name="post_reply"  id="post_reply" class="form-control" style="resize: none; height: 30%; font-weight: 700; font-family: 'Times New Roman'; font-size: medium;"></textarea>
                    <br />
                    <input type="submit" name="reply" id="reply" value="Add Reply" class="btn btn-success" />
                    <span id="error_message_reply" class="text-danger" style="padding: 200px;" ></span>


                </form>



            </div>

        </div>
    </div>
</div>



<!--- Modal Opened after clicking Add Question button -->


<div id="add_data_Modal" class="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <form method="post" id="insert_form">

                    <label>Enter your question</label>
                    <textarea name="post"  id="post" class="form-control"  style="resize: none; height: 30%; font-weight: 800; font-family: 'Helvetica',sans-serif;"></textarea>
                    <br />
                    <input type="submit" name="insert" id="insert" value="Post Question" class="btn btn-success" />
                    <span id="error_message" class="text-danger" ></span>



                </form>

            </div>

        </div>
    </div>
</div>


    </body>
</html>
<?php
}
?>