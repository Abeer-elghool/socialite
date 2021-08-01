<?php
include_once('DbConnect.php');

class Post
{
    private $id;
    private $title;
    private $body;
    private $file_name;

    /**
     * Register constructor.
     * @param $id
     * @param $title
     * @param $body
     * @param $file_name ;
     */
    public function __construct($id = null , $title, $body, $file_name)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->file_name = $file_name;
        if($id != null) {
            $this->updatePost();
        }else{
            $this->createPost();
        }
    }

    public static function getAll(){
        $data = [];
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE  admin_accept = 1 ORDER BY created_at desc";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) != 0){
            $data = mysqli_fetch_all($result);
        }
        return $data;
    }

    public function createPost(){
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "INSERT INTO posts (title, subject, image, user_id) 
                VALUES ('$this->title', '$this->body', '$this->file_name', '$user_id')";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        return true;
    }

    public static function getMyPosts(){
        $data = [];
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = '$user_id' ORDER BY created_at desc";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) != 0){
            $data = mysqli_fetch_all($result);
        }
        return $data;
    }

    public static function getById($id){
        $data = [];
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = '$user_id' AND id = '$id'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) != 0){
            $data = mysqli_fetch_assoc($result);
        }
        return $data;
    }

    public function updatePost(){
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "UPDATE posts SET ";
        $i = 0;
        if($this->title != null) {
            $i++;
            $sql .= " title = '$this->title' ";
        }
        if($this->body != null) {
            if($i != 0){
                $sql .= ' , ';
            }
            $sql .= " subject = '$this->body'";
        }
        if($this->file_name != null) {
            if($i != 0){
                $sql .= ' , ';
            }
            $sql .= " image = '$this->file_name'";
        }
        $sql .= " WHERE user_id = '$user_id' AND id = '$this->id'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        return true;
    }

    public static function deleteById($id){
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "DELETE FROM posts WHERE '$user_id' AND id = '$id'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_affected_rows($db_conn->getConnection()) != 0){
            return true;
        }
        return false;
    }
}