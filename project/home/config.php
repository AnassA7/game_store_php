<?php

$server = "localhost";
$username = "root";
$password = ""; 
$db = "game_store";


$con = new mysqli($server, $username, $password, $db, 3307);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Connected successfully";
}

?>
