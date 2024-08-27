<?php 

$server = "localhost";
$usernme = "root";
$password = "";
$database = "db_test";

$connection = mysqli_connect("$server","username","password");
$select_db = mysqli_select_db($connection, $database);

if(!$select_db){
    echo ("connection terminate");
}
?>
