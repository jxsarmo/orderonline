<?php

        $server = 'localhost';
        $user = 'root';
        $password = 'root';
        $db_name = 'yummy-bar'; /*name of the table created*/
        $port = '3306'; /*MySQL port in Xampp*/


        $con = mysqli_connect($server, $user, $password, $db_name, $port);
        
        if(!$con){
            die("Database Selection failed" . mysqli_error($connection));
        } else {
            echo 'The connection was completed successfully.';
        }

        $select_db = mysqli_select_db($con, 'yummy-bar');
        if (!$select_db){
            die("database selection failed". mysqli_error($con));
        }

    

?>    