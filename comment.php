<?php
include_once('helpers/session.php');
include_once('classes/Comment.php');
include_once('helpers/functions.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $comment = new Comment(CleanInputs($_POST['comment']), $_POST['post_id']);
    $comment->createComment();
    header("Location: ". webUrl("home.php"));
}