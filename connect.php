<?php

    $servername = "localhost"; // details
    $username = "student";
    $password= "website";
    $db = "Labwork";

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $db); // details into a sturctured query

    // Check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
?>
