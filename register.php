<?php

include('classes/Register.php');
include('classes/Validator.php');
include('layouts/header.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $status = true;
    $validator = new Validator($_POST['name'], $_POST['email'], $_POST['password'],
        $_POST['phone'], $_POST['city'], $_POST['address']);
    if(is_array($validator->getName()) || is_array($validator->getEmail()) || is_array($validator->getName()) || is_array($validator->getPassword())
        || is_array($validator->getPhone()) || is_array($validator->getCity()) || is_array($validator->getAddress())){
        echo '<div class="alert alert-danger" role="alert">
              Invalid Inputs! please try again 
            </div>';
        $status = false;
    }
    if($status == true) {
        $file_name = uploadImage($_FILES['personalImage']);
        $register_obj = new Register($validator->getName(), $validator->getEmail(), $validator->getPassword(),
            $validator->getPhone(), $validator->getCity(), $validator->getAddress(), $file_name);
        echo '<div class="alert alert-success" role="alert">
              Register Successfully, please 
              <a href="login.php">login</a>
            </div>';
    }
}

include('register.html');
include('layouts/footer.html');

