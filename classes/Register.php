<?php
include('DbConnect.php');

class Register
{
    private $name;
    private $email;
    private $password;
    private $phone;
    private $city;
    private $address;
    private $file_name;

    /**
     * Register constructor.
     * @param $name
     * @param $email
     * @param $password
     * @param $phone
     * @param $city
     * @param $address
     * @param $file_name;
     */
    public function __construct($name, $email, $password, $phone, $city, $address, $file_name)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->city = $city;
        $this->address = $address;
        $this->file_name = $file_name;
        $this->register();
    }

    public function register(){
        $db_conn = DbConnect::getInstance();
        $password = sha1($this->password);
        $sql = "SELECT * FROM users WHERE email = '$this->email' or phone = '$this->phone'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) != 0){
            return false;
        }
        $sql = "INSERT INTO users (name, email, phone, address, city, password, user_type, image) 
                VALUES ('$this->name', '$this->email', '$this->phone', '$this->address', '$this->city', '$password', 'user', '$this->file_name')";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        return true;
    }

}