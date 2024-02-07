<?php

$servername = "localhost";
$username = "fluktar";

$dbname = "demo_db";
$pas = require_once('passwordBase.php');

// Create connection
$conn = new mysqli($servername, $username, $pas, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$conn->close();
return $conn;
