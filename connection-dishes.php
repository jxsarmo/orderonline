<?php

        /*$server = 'localhost';
        $user = 'root';
        $password = 'root';
        $db_name = 'yummy-bar'; /*name of the table created
        $port = '3306'; MySQL port in Xampp
        */

        $server = 'mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        $user = 'silulw6q1bquo1gc';
        $password = 'qcdzu4wvonapunu4';
        $db_name = 'c7w3q9s4d50778ny'; 
        $port = '3306'; 
        


        $con = mysqli_connect($server, $user, $password, $db_name, $port);
        
        if(!$con){
            die("Database Selection failed" . mysqli_error($connection));
        } else {
            echo 'The connection was completed successfully.';
        }

        $select_db = mysqli_select_db($con, 'c7w3q9s4d50778ny');
        if (!$select_db){
            die("database selection failed". mysqli_error($con));
        }

    

?>    