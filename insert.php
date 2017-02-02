<?php session_start();
if(!isset($_SESSION['id'])) {
    include_once("index.php");
}else{
include_once("config/dbconfig.php");



if(!empty($_POST)) {

    $output = '';
    $post_content = $_POST["post"];
    $post_creator = $_SESSION["username"];
    $user_id = $_SESSION["id"];

    $sql = "SELECT post_content from posts";
    $response = mysqli_query($con,$sql);
    while($res = mysqli_fetch_assoc($response)){

       if($post_content == $res['post_content']){
           echo "unsuccess";
           exit();

       }
    }


        $query = "INSERT INTO posts(post_creator,post_content,posted_date,user_id)VALUES('$post_creator','$post_content',now(),$user_id)";


        $result = mysqli_query($con,$query);
        if (!$result) {
            die(mysqli_error());
        } else {

            $select = "SELECT * FROM posts ORDER BY id DESC";
            $result = mysqli_query($con,$select);
            if($result){
                $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
                echo $rows['post_content'];

            }


        }




}



?>
<?php }
