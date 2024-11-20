<?php
include_once("db.php");

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

$query = "SELECT * FROM users WHERE `username`=:username";

try {
    $query = $dbConn->prepare($query);
    $query->execute([":username" => $username]);
} catch (PDOException $e) {
    echo json_encode(["status" => "500", "message" => "Internal server error", "exception" => $e]);
    return;
}

$rows = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) < 1 || !password_verify($password, $rows[0]["password"])) {
    echo json_encode(["status" => "401", "message" => "Invalid auth"]);
    return;
}

$user = $rows[0];

session_start();
$_SESSION["id"] = $user["id"];
$_SESSION["username"] = $user["username"];

echo json_encode(["status" => "200", "message" => "Valid auth"]);
return;