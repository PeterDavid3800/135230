<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "isproject2";

$connect = new mysqli($host, $username, $password, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
