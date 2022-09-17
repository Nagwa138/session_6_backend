<?php

$host = "localhost";

$db_name = "ecommerce";

$user_name = "root";

$password = "";

$connection = mysqli_connect($host, $user_name, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}    