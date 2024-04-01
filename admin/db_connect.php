<?php 

/*$server = 'mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$user = 'silulw6q1bquo1gc';
$password = 'qcdzu4wvonapunu4';
$db_name = 'c7w3q9s4d50778ny'; 
$port = '3306'; */

$server = 'localhost';
$user = 'root';
$password = 'root';
$db_name = 'yummy_bar_new'; 
$port = '3306'; 

$conn= new mysqli('localhost','root','root','yummy_bar_new', '3306')or die("Could not connect to mysql".mysqli_error($con));
/*$conn= new mysqli($server, $user, $password, $db_name, $port)or die("Could not connect to mysql".mysqli_error($con));*/

