<?php
session_start();
if (!isset($_SESSION["id"])) {
    echo json_encode(["error" => "503", "message" => "You are unauthorized to access this."]);
}

echo json_encode(["body" => []]);
// echo json_encode(["body" => ["0" => ["name" => "Julac Ontina"]]]);