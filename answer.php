<?php session_start();
if(!isset($_SESSION['id'])) {
    include_once("index.php");
}else{
    include_once("config/dbconfig.php");

    if(isset($_POST['qsn_id'])) {

        $username = $_SESSION['username'];
        $user_id = $_SESSION['id'];

        $reply = $_POST["response"];

        $table_name = "posts";

        $id = $_POST['qsn_id'];




        $sql = "select user_id from posts where post_id=$id";
        $response = mysqli_query($con,$sql) or die(mysqli_error());
        $row = mysqli_fetch_assoc($response);


        $user = $row['user_id'];
        if($user == $user_id)
        {
           echo "unsuccess";
            exit();

        }






        else{
            $query = "INSERT INTO response(response_date,response_content,respondant,user_id,post_id) VALUES (now(),'$reply','$username',$user_id,$id)";


            $result = mysqli_query($con,$query);
            if($result){
                $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
                echo $rows['post_response'];
            }
        }




        $sql1 = "select response_content from response where post_id=$id";
        $response1 = mysqli_query($con,$sql1) or die(mysqli_error());

        while($res = mysqli_fetch_assoc($response1)){
            if($reply == $res['response_content'] ){
                echo "duplicate";
                exit();
            }
        }



    }



}
?>
