<?php

include_once('helpers/functions.php');

class Validator
{
    private $name;
    public static $email;
    public static $password;
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
        $this->name = CleanInputs($name) ? $name : ['success' => false, 'msg' => 'Invalid Name'];
        self::$email = Validator($email,4) ? $email : ['success' => false, 'msg' => 'Invalid Email'];
        self::$password = !empty($password) && Validator($password,2) ? $password : ['success' => false, 'msg' => 'Invalid Password'];
        //$this->phone = strlen($phone) > 11 && is_numeric($phone) ? $phone : ['success' => false, 'msg' => 'Invalid Phone Number'];
        $this->phone = $phone;
        $this->city = CleanInputs($city) ? $city : ['success' => false, 'msg' => 'Invalid City'];
        $this->address = CleanInputs($address) ? $address : ['success' => false, 'msg' => 'Invalid Address'];
    }

    public static function valid($email, $password)
    {
        self::$email = Validator($email,4) ? $email : ['success' => false, 'msg' => 'Invalid Email'];
        self::$password = !empty($password) && Validator($password,2) ? $password : ['success' => false, 'msg' => 'Invalid Password'];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return self::$email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return self::$password;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }
}