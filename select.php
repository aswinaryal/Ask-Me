<?php
session_start();
include_once("config/dbconfig.php");
if(isset($_POST['post_id']))
{
    $output = '';
    $id = $_POST['post_id'];

    $sql = "SELECT * FROM response WHERE post_id = $id";
    $check = mysqli_query($con,$sql);
    $content  = mysqli_fetch_array($check);
    $response_content = $content["response_content"];

    if(!empty($response_content)){


        $query = "SELECT * FROM posts WHERE post_id = $id";

        $result = mysqli_query($con,$query) or die(mysqli_error($con));

        $output.='<div class="table-responsive" style="margin-left: 50px; margin-right: 50px; margin-top: 30px;">
             <table class="table table-responsive">';
        while($row = mysqli_fetch_array($result)){
            $query1 = "select * from response where post_id=".$row['post_id'];
            $result1= mysqli_query($con,$query1);
            $response = "";
            while ($res = mysqli_fetch_assoc($result1)){
                $query2 = "select * from users where id=".$res['user_id'];
                $result2 = mysqli_query($con,$query2);


                while ($res2 = mysqli_fetch_assoc($result2)){


                            $checkVar = "";

                            if((empty($res2['bio'])) AND ($res['user_id'] == $_SESSION['id'] ))
                            {
                                $checkVar = '<a href="bio.php">Add bio</a>';
                            }
                            if(!empty($res2['bio']))
                            {
                                $checkVar = $res2['bio'];
                            }



                    $query3 = "select * from users where id=".$row['user_id'];
                    $result3 = mysqli_query($con,$query3);
                    $res3 = mysqli_fetch_array($result3);
                    $questions = "";







                    $questions = "<div style='font-weight: normal !important;' class='table-responsive'>
                                    <a href='profile.php?id=".$row['user_id']."'> <img src=".$res3['profile_pic']." class='img-circle' style='width:5%;'></a>
                                     <div style='margin-top: -40px;margin-left: 50px;padding: 10px; font-size:13px;'>
                                     ".$row["post_creator"].", ".$res3['bio']." <br />
                                     Asked At : ".$row['posted_date']."
                                     </div>
                                     <label>".$row['post_content']."  </label>
                                     
                                    </div>".$questions;




                    $response =  "<div style='font-weight: normal !important;' class='table-responsive'>
                                <hr />
                                    <div style='text-align:left;'>
                                            <div>
                                            <a href='profile.php?id=".$res['user_id']."'> <img src=".$res2['profile_pic']." class='img-circle' style='width:5%;'></a>
                                                   <div style='margin-top: -40px;margin-left: 50px;padding: 10px; font-size:13px;'>
                                                    ".$res['respondant'].", ".$checkVar." <br />
                                                     Written At: " .$res['response_date']. " 
                                                    </div>
                                            </div>
                                    </div>
                                            <div style=' color:rgba(0, 0, 0, 0.65); font-size:15px;'>
                                                " .$res['response_content']."
                                            </div>
                                 </div>".$response;







                }

            }

            $output .= '
            <tr>

                <td width="100%">
               
                '.$questions.'
                '.$response.'
                <hr />
                <div style="text-align:center;cursor: pointer;"><a onclick="change_id('.$id.');" name="answer_button" data-target="#answer_data_Modal" data-toggle="modal">Add Your Reply</a></div>
               <hr />
                </td>
               
            </tr>
            
    <?php
    ';


        }

        $output.='</table></div>';
        echo $output;




    }else{

        $output =  "Not any replies have been posted to this question";
        $output .= '<hr />
        <div style="text-align:center;cursor: pointer;"><a onclick="change_id('.$id.');" name="answer_button" data-target="#answer_data_Modal" data-toggle="modal">Add Your Reply</a></div> ';

        echo $output;

    }







}

?>