<?php
include_once('DbConnect.php');


class Comment
{

    private $post_id;
    private $comment;

    /**
     * Comment constructor.
     * @param $post_id
     * @param $comment
     */
    public function __construct($comment, $post_id)
    {
        $this->post_id = $post_id;
        $this->comment = $comment;
    }

    public function createComment(){
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "INSERT INTO comments (comment, post_id, user_id) 
                VALUES ('$this->comment', '$this->post_id', '$user_id')";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        return true;
    }

    public static function getComments($post_id){
        $data = [];
        $db_conn = DbConnect::getInstance();
        $sql = "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY 'desc'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) != 0){
            $data = mysqli_fetch_all($result);
        }
        return $data;
    }

}