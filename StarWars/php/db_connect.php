<?php

//Database connect credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "StarWars";

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_error()){
    die("Database connection failure!");
}

