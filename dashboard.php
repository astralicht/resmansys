<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php?auth=required");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="egg.css">
    <title>Restaurant MS</title>
    <script src="scripts/DOM.js" defer></script>
    <script src="scripts/fade.js" defer></script>
    <script src="scripts/fetch.js" defer></script>
    <script src="scripts/dashboard.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <style type="text/css">
        * {
            border-radius: var(--border-radius);
            scrollbar-color: #444 transparent;
            scrollbar-width: thin;
        }

        html, body {
            overflow: hidden;
        }

        body {
            background-color: #222;
        }

        div#spa-menu {
            width: 250px;
            min-width: 250px;
            gap: var(--gap);
        }

        div#spa-menu button.spa-nav-button {
            background-color: transparent;
            transition: background-color .15s;
            color: white;
            display: flex;
            gap: var(--gap);
            align-items: center;
        }

        div#spa-menu button.spa-nav-button[active] {
            background-color: var(--primary-color);
        }

        div#spa-menu button.spa-nav-button#settings {
            background-color: #151515;
        }

        div#spa-menu button.spa-nav-button#settings[active] {
            background-color: var(--alert-color);
            border: none;
        }

        div#partials-container {
            padding: var(--pad);
            overflow: hidden;
        }

        div.spa-content-container {
            flex-grow: 1;
            height: 100%;
            overflow: auto;
            padding: 16px 32px;
            color: var(--white-color);
            background-color: #151515;
        }

        div.spa-content-container > div {
            display: none;
            opacity: 0;
            transition: opacity .15s;
        }

        input#res-date-filter {
            width: 175px;
        }

        div.tables-container div.tables-row {
            flex-wrap: wrap;
            justify-content: center;
        }

        div.tables-container div.table {
            position: relative;
            height: 200px;
            width: 300px;
            cursor: pointer;
            padding: var(--pad);
            overflow: hidden;
            /* background-image: linear-gradient(transparent, transparent, transparent, rgb(0 0 0 / .25)); */
        }

        div.tables-container div.table:hover {
            background-image: linear-gradient(rgb(0 0 0 / .15) 0 0);
        }

        div.tables-container div.table div.open-indicator {
            position: absolute;
            right: 8px;
            bottom: 4px;
        }

        div.tables-container div.table-header {
            display: flex;
            align-items: center;
            gap: var(--gap);
        }

        div.tables-container div.table ul.order-list {
            list-style-type: none;
        }

        div.tables-container div.table ul.order-list > li {
            display: flex;
            align-items: center;
            gap: var(--gap);
        }
    </style>
</head>
<body full-width flex="h" no-gap>
    <div id="spa-menu" flex="v" full-height pad>
        <h4 white-fr style="text-align: center;">ResManSys</h4>
        <button class="spa-nav-button" id="tables" active><i class="fa-solid fa-border-all"></i>Tables</button>
        <button class="spa-nav-button" id="reservations"><i class="fa-solid fa-phone"></i>Reservations</button>
        <button class="spa-nav-button" id="menu"><i class="fa-solid fa-utensils"></i>Menu</button>
        <div flex="v" grow v-end>
            <p white-fr no-margin style="text-align: center;">Hi, <?= $_SESSION["username"] ?>!</p>
            <button white-fr full-width class="spa-nav-button" id="settings"><i class="fa-solid fa-gear"></i>Settings</button>
        </div>
    </div>
    <div id="partials-container" flex="h" grow>
        <div class="spa-content-container">
            <?php include_once("partials/_tables.php"); ?>
            <?php include_once("partials/_reservations.php"); ?>
            <?php include_once("partials/_menu.php"); ?>
            <?php include_once("partials/_settings.php"); ?>
        </div>
    </div>
</body>
</html>