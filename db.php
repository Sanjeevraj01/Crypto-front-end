<?php
    $server = "sql103.epizy.com";
    $username = "epiz_30603680";
    $password = "7zMxytY7BZLRo";
    $dbname = "epiz_30603680_user";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    if(!$conn){
        die("connection failed:".mysqli_connect_error());
    }
?>