<?php

include('helpers/functions.php');

class Validator
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
        $this->name = CleanInputs($name) ? $name : ['success' => false, 'msg' => 'Invalid Name'];
        $this->email = Validator($email,4) ? $email : ['success' => false, 'msg' => 'Invalid Email'];
        $this->password = Validator($password,2) ? $password : ['success' => false, 'msg' => 'Invalid Password'];
        //$this->phone = strlen($phone) > 11 && is_numeric($phone) ? $phone : ['success' => false, 'msg' => 'Invalid Phone Number'];
        $this->phone = $phone;
        $this->city = CleanInputs($city) ? $city : ['success' => false, 'msg' => 'Invalid City'];
        $this->address = CleanInputs($address) ? $address : ['success' => false, 'msg' => 'Invalid Address'];
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
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
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