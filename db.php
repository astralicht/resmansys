<?php
$host = "localhost";
$db_name = "restaurantms";
$username = "root";
$password = "";

try {
    $dbConn = new \PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $dbConn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header("Location: login.php?e=server-error");
}