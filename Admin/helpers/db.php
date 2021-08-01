<?php 

$server = "localhost";
$dbName = "socialite";
$dbUser = "root";
$dbPassword ="";


 $con = mysqli_connect($server,$dbUser,$dbPassword,$dbName);

 if(!$con){
     die('Error '.mysqli_error_connect());
 }

?>