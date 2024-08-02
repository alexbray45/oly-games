<?php
$dsn = "mysql:host=localhost;dbname=funolympicgamesdb";
$db_user = "root";
$db_password ="";

    try {
        $pdo = new PDO($dsn, $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo; // Return the PDO object
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }

