<?php
include('DbConnect.php');

class Login
{
    public static $email;
    public static $password;

    /**
     * Register constructor.
     * @param $email
     * @param $password
     */
    public function __construct($email, $password)
    {
        self::$email = $email;
        self::$password = $password;
        $this->login();
    }

    public function login(){
        $db_conn = DbConnect::getInstance();
        $password = sha1(self::$password);
        $email = self::$email;
        $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) == 1){
            session_start();
            $data = mysqli_fetch_assoc($result);
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $data;
        }
        return false;
    }
}