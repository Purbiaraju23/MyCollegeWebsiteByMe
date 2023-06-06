<?php

$host="localhost";
$user="root";
$password="raju978";
$database="collegedb";

// Create a connection
$conn = new mysqli($host,$user,$password,$database);

// Check connection
if ($conn->error) {
    die("Connection failed: ");
}
?>
