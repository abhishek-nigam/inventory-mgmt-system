<?php

//  Credentials
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';

//  Database to use
    $mysql_db = 'dmrc_inventory';

    $conn = @mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_db);

//  Check connection
    if(mysqli_connect_errno())
    {
        echo 'Failed to connect to MySQL. Error: '.mysqli_connect_errno();
    }
?>

