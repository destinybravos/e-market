<?php
    $server_hostname = 'localhost';
    $server_username = 'root';
    $server_password = '';
    $database = 'emarket';

    $conn = new MySQLi($server_hostname, $server_username, $server_password, $database);

    if($conn->connect_error){
        echo $conn->connect_error;
    }


?>