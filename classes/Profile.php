<?php


class Profile
{
    private $name;
    private $email;
    private $phone;
    private $city;
    private $address;
    private $file_name;

    /**
     * Register constructor.
     * @param $name
     * @param $email
     * @param $phone
     * @param $city
     * @param $address
     * @param $file_name ;
     */
    public function __construct($name, $email, $phone, $city, $address, $file_name)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->city = $city;
        $this->address = $address;
        $this->file_name = $file_name;
        $this->update();
    }

    public function update(){
        $db_conn = DbConnect::getInstance();
        $user_id = $_SESSION['user']['id'];
        $sql = "UPDATE users SET ";
        $i = 0;
        if($this->name != null) {
            $i++;
            $sql .= " name = '$this->name' ";
        }
        if($this->phone != null) {
            if($i != 0){
                $sql .= ' , ';
            }
            $sql .= " phone = '$this->phone'";
        }
        if($this->email != null) {
            if($i != 0){
                $sql .= ' , ';
            }
            $sql .= " email = '$this->email'";
        }
        if($this->city != null) {
            if($i != 0){
                $sql .= ' , ';
            }
            $sql .= " city = '$this->city'";
        }
        if($this->address != null) {
            if($i != 0){
                $sql .= ' , ';
            }
            $sql .= " address = '$this->address'";
        }
        if($this->file_name != null) {
            if($i != 0){
                $sql .= ' , ';
            }
            $sql .= " image = '$this->file_name'";
        }
        $sql .= " WHERE id = '$user_id'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        $sql = "SELECT * FROM users WHERE id = '$user_id'";
        $result = mysqli_query($db_conn->getConnection(), $sql);
        if(mysqli_num_rows($result) == 1){
            session_start();
            $data = mysqli_fetch_assoc($result);
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $data;
        }
        return true;
    }
}