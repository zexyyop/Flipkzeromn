<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "summercashback_kitchenblank";
$password = "l0feAaPvE6Do";
$dbname = "summercashback_kitchenblank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 ?>