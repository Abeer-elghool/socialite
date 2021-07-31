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

    /**
     * Register constructor.
     * @param $name
     * @param $email
     * @param $password
     * @param $phone
     * @param $city
     * @param $address
     */
    public function __construct($name, $email, $password, $phone, $city, $address)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->city = $city;
        $this->address = $address;
        $this->register();
    }

    public function register(){
        $password = sha1($this->password);
        $sql = "INSERT INTO users (name, email, phone, address, city, password, user_type) 
                VALUES ('$this->name', '$this->email', '$this->phone', '$this->address', '$this->city', '$password', 'user')";
        $db_conn = DbConnect::getInstance();
        $result = mysqli_query($db_conn->getConnection(), $sql);
        //return mysqli_num_rows($result) == 1;
    }

}