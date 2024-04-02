<?php 

/*$server = 'mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$user = 'silulw6q1bquo1gc';
$password = 'qcdzu4wvonapunu4';
$db_name = 'c7w3q9s4d50778ny'; 
$port = '3306'; */

// Updated server details for Docker environment
$server = 'host.docker.internal'; // Use the service name defined in docker-compose.yml as the hostname
$user = 'root';
$password = 'root';
$db_name = 'yummy_bar_new';
$port = '3306';

// Create connection using updated server details
$conn = new mysqli($server, $user, $password, $db_name, $port);

// Check connection
if ($conn->connect_error) {
    die("Could not connect to MySQL: " . $conn->connect_error);
}
