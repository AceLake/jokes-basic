<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
$host = "localhost";
$port = "8889";
$username = "root";
$user_pass = "root";
$database_in_use = "jokesdb";


$mysqli = mysqli_connect($host, $username, $user_pass, $database_in_use, $port);
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>
