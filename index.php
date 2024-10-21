<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php?msg=required");
    return;
}
header("Location: dashboard.php");