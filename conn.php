<?php
    $db_name = "skynet_users";
    $db_user = "root";
    $db_password = "";
    $server_name = "localhost";

    $conn = mysqli_connect($server_name, $db_user, $db_password, $db_name);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>