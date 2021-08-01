<?php
include_once('helpers/session.php');
include_once('classes/Like.php');
include_once('helpers/functions.php');
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['like'])) {
    new Like($_GET['like']);
    header("Location: ".webUrl('home.php'));
}