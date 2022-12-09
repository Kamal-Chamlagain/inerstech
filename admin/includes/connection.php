<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $databse_name = "inerstech";
    $connection = new mysqli($server, $username, $password, $databse_name);
    if($connection){
        $connection->get_connection_stats();
        // echo "Connected";
    }
    else{
        die($connection->connection_aborted);
    }