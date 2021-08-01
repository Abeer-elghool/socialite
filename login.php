<?php

include('classes/Login.php');
include('classes/Validator.php');
include('layouts/header.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $status = true;
    $validator = Validator::valid($_POST['email'], $_POST['password']);
    if(is_array(Validator::$email) || is_array(Validator::$password)){
        echo '<div class="alert alert-danger" role="alert">
              Invalid Inputs! please try again 
            </div>';
        $status = false;
    }
    if($status == true) {
        $register_obj = new Login(Validator::$email, Validator::$password);
        header("Location: ".webUrl('home.php'));
    }
}

include('login.html');
include('layouts/footer.html');
