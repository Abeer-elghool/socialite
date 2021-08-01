<?php
include_once('DbConnect.php');

class Like
{
    private $post_id;

    /**
     * Like constructor.
     * @param $post_id
     */
    public function __construct($post_id)
    {
        $this->post_id = $post_id;
        $this->like();
    }

    public function like(){
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM likes WHERE user_id = '$user_id' and post_id = '$this->post_id'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) == 1){
            $sql = "DELETE FROM likes WHERE user_id = '$user_id' and post_id = '$this->post_id'";
            $result = mysqli_query($db_conn->getConnection(), $sql);
        }else{
            $sql = "INSERT INTO likes (user_id, post_id) VALUES ('$user_id', '$this->post_id')";
            $result = mysqli_query($db_conn->getConnection(), $sql);
        }
    }

    public static function LikesCount($post_id){
        $db_conn = DbConnect::getInstance();
        $sql = "SELECT * FROM likes WHERE post_id = '$post_id'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) != 0){
            $data = mysqli_fetch_all($result);
            return count($data);
        }
    }

}