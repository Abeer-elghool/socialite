<?php

include_once('helpers/session.php');
include('classes/Post.php');
include('layouts/header.php');
$posts = Post::getAll();
include('home_struc.php');
include('layouts/footer.html');