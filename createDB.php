<?php

function createDB(){
    $servername = "localhost";
    $username = "root";
    $password = "PASSWORD";

// Create connection
    $conn = mysqli_connect($servername, $username, $password);

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $dbname = "demoEmp";

    $checkDbQuery = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
    $checkDbResult = mysqli_query($conn, $checkDbQuery);

    if (!$checkDbResult) {
        die("Error: " . mysqli_error($conn));
    }

    $dbExists = mysqli_num_rows($checkDbResult) > 0;

    if (!$dbExists) {
        $createDbQuery = "CREATE DATABASE $dbname";

        if (mysqli_query($conn, $createDbQuery)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . mysqli_error($conn);
        }
    } else {
        echo "Database already exists";
    }

    mysqli_close($conn);
}

?>
