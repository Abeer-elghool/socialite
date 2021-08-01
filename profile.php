<?php

include_once('helpers/session.php');
include('classes/Post.php');
include('layouts/header.php');
$posts = Post::getMyPosts();
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['edit'])) {
    $post = Post::getById($_GET['edit']);
}
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['delete'])) {
    Post::deleteById($_GET['delete']);
}
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['edit_profile'])) {
    $user_data = $_SESSION['user'];
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET
        ['update_profile'])) {
    echo 123;
    die();
    $user_data = $_SESSION['user'];
}else if($_SERVER['REQUEST_METHOD'] == "POST") {
    $file_name = null;
    if(isset($_POST['id'])){
        if(isset($_FILES['postImage']) && !empty($_FILES['postImage']['name'])){
            $file_name = uploadImage($_FILES['postImage']);
        }
        $register_obj = new Post($_POST['id'],CleanInputs($_POST['title']), CleanInputs($_POST['subject']), $file_name);
    }else {
        $file_name = uploadImage($_FILES['postImage']);
        $register_obj = new Post(null, CleanInputs($_POST['title']), CleanInputs($_POST['subject']), $file_name);
    }
    header("Location: ".webUrl('profile.php'));
}

include('profile_struc.php');
include('layouts/footer.html');
