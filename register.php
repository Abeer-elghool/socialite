<?php

include('layouts/header.html');
include('register.html');
include('layouts/footer.html');
include('classes/Register.php');
include('classes/Validator.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $validator = new Validator($_POST['name'], $_POST['email'], $_POST['password'],
        $_POST['phone'], $_POST['city'], $_POST['address']);
    if(is_array($validator->getName()) || is_array($validator->getEmail()) || is_array($validator->getName()) || is_array($validator->getPassword())
        || is_array($validator->getPhone()) || is_array($validator->getCity()) || is_array($validator->getAddress())){
        return false;
    }
    $register_obj = new Register($validator->getName(), $validator->getEmail(), $validator->getPassword(),
    $validator->getPhone(), $validator->getCity(), $validator->getAddress());
}

