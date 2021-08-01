<?php
include('functions.php');

session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
    header("Location: ".webUrl('login.php'));
}else{
    $user = $_SESSION['user'];
}

