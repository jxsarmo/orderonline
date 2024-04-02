<?php

// Updated server details for Docker environment
$server = 'db2'; // Use the service name defined in docker-compose.yml as the hostname
$user = 'root';
$password = 'root';
$db_name = 'yummy-bar'; // Name of the database
$port = '3306'; // Default MySQL port

// Create connection
$con = mysqli_connect($server, $user, $password, $db_name, $port);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_error($con));
} else {
    echo 'The connection was completed successfully.';
}

// No need to select the database again as it's already specified in the connection
?>
