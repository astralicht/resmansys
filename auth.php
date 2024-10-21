<?php
include_once("db.php");

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM users WHERE `username`=:username";

try {
    $query = $dbConn->prepare($query);
    $query->execute([":username" => $username]);
} catch (PDOException $e) {
    echo $e->getMessage();
    return;
}

$rows = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) < 1) {
    header("Location: login.php?e=auth-invalid");
    return;
}

$user = $rows[0];

if (!password_verify($password, $user["password"])) {
    header("Location: login.php?e=auth-invalid");
    return;
}

session_start();
$_SESSION["id"] = $user["id"];
$_SESSION["username"] = $user["username"];

header("Location: dashboard.php");
return;