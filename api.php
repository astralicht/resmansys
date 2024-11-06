<?php
session_start();
if (!isset($_SESSION["id"])) {
    echo json_encode(["status" => "503", "message" => "You are unauthorized to access this."]);
    return;
}

$host = "localhost";
$db_name = "restaurantms";
$username = "root";
$password = "";

try {
    $dbConn = new \PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $dbConn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["status" => "503", "message" => "Could not establish databse connection. Contact the web admin to fix this issue.", "exception_message" => $e->getMessage()]);
    return;
}

// Tables
// GET all tables
if (isset($_GET["tables"])) {
    if ($_GET["tables"] == "all") {
        $query = "SELECT t.`id` AS id, t.`status` AS status, r.`name` AS res_name, r.`date` AS res_date
                    FROM tables AS t
                    LEFT JOIN reservations AS r
                    ON t.`id`=r.`table_id`
                    AND DATE(r.`date`)=CURRENT_DATE()
                    ORDER BY t.`id`";

        try {
            $query = $dbConn->prepare($query);
            $query->execute();
            $tables = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo json_encode(["status" => "500", "message" => "Internal server error. Contact the web admin to fix this issue.", "exception_message" => $e->getMessage()]);
            return;
        }

        $query = "SELECT tors.`table_id` AS table_id, m.`id` AS menu_id, m.`name` AS name, tors.`requests` AS requests, tors.`is_fulfilled` AS is_fulfilled
                    FROM tables_orders AS tors
                    INNER JOIN menu AS m
                    ON tors.`menu_id`=m.`id`
                    AND m.`date_removed` IS NULL;";

        try {
            $query = $dbConn->prepare($query);
            $query->execute();
            $tablesOrders = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo json_encode(["status" => "500", "message" => "Internal server error. Contact the web admin to fix this issue.", "exception_message" => $e->getMessage()]);
            return;
        }

        foreach($tablesOrders as $order) {
            $tableIndex = $order["table_id"]-1;
            if (!isset($tables[$tableIndex]["orders"])) {
                $tables[$tableIndex]["orders"] = [];
            }

            array_push($tables[$tableIndex]["orders"], ["menu_id" => $order["menu_id"], "name" => $order["name"], "is_fulfilled" => $order["is_fulfilled"]]);
        }

        $tableTemplate = file_get_contents("partials/_table_template.php");

        echo json_encode(["status" => "200", "tables" => $tables, "tables_orders" => $tablesOrders, "template" => $tableTemplate]);
        return;
    }
}


// Reservations
// GET all reservations
if (isset($_GET["reservations"])) {

}


// Menu
// GET all menu items
if (isset($_GET["menu"])) {

}


// Auth
if (isset($_GET["auth"]) && $_GET["auth"] == "check") {
    $query = "SELECT * FROM users WHERE `username`=:username";

    try {
        $query = $dbConn->prepare($query);
        $query->execute([":username" => $_GET["username"]]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "503", "message" => $e->getMessage()]);
        return;
    }

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) < 1 || !password_verify($_GET["password"], $rows[0]["password"])) {
        echo json_encode(["status" => "503", "message" => "Invalid credentials."]);
        return;
    }
    
    echo json_encode(["status" => "200", "message" => "Credentials verified."]);
    return;
}