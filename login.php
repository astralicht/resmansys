<?php
session_start();
if (isset($_SESSION["id"])) {
    header("Location: dashboard.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="egg.css">
    <title>Login | Kaen Management </title>
    <style type="text/css">
        * {
            border-radius: var(--border-radius);
        }

        body {
            background-color: #222;
            color: white;
        }

        form {
            width: 550px;
            min-width: 550px;
        }

        #message {
            display: none;
            text-align: center;
        }
    </style>
    <script src="scripts/DOM.js" defer></script>
    <script src="scripts/fade.js" defer></script>
    <script src="scripts/fetch.js" defer></script>
    <script src="scripts/login.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
</head>
<body full-height full-width flex="h" v-center h-center>
    <form action="auth.php" method="POST" id="login" flex="v" h-center pad>
        <h3>Kaen Management</h3>
        <p id="message" white-text pad full-width></p>
        <div full-width>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Aa" required>
        </div>
        <div full-width>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Aa" required>
        </div>
        <button type="submit" pad good-bg white-text full-width style="border: none; text-align: center; margin: 16px 0;"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;<b>Login</b></button>
    </form>
</body>
</html>