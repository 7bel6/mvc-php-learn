<?php
    // specify your own database credentials
    $dsn = "mysql:host=localhost;dbname=tracker";
    $username = "root";
    $password = "";

    // try to connect to the database using PDO
    try{
        // PDO is a PHP data object that allows you to connect to a database
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $error) {
        // if the connection fails, terminate the script
        echo $error->getMessage();
        exit();
    }
?>