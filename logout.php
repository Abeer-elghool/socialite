<?php

include('helpers/functions.php');

session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header("Location: ".webUrl('login.php'));