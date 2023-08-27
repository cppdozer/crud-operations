<?php

function createTable(){

    $servername = "localhost";
    $username = "root";
    $password = "PASSWORD";
    $dbname = "demoEmp";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $tableName = "employees";

    $checkTableQuery = "SHOW TABLES LIKE '$tableName'";
    $checkTableResult = mysqli_query($conn, $checkTableQuery);

    if (!$checkTableResult) {
        die("Error: " . mysqli_error($conn));
    }

    $tableExists = mysqli_num_rows($checkTableResult) > 0;

    if (!$tableExists) {
        $createTableQuery = "
        CREATE TABLE $tableName (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            emp_name VARCHAR(100) NOT NULL,
            emp_address VARCHAR(255) NOT NULL,
            salary INT(10) NOT NULL
        )
    ";

        if (mysqli_query($conn, $createTableQuery)) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
    } else {
        echo "Table already exists";
    }

    mysqli_close($conn);
}


?>
