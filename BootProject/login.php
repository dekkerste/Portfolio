<?PHP
// Session must be placed above all else.
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
// @TODO Do we need the conn??
// Require the DB connection file only once.
require_once 'conn.php';


// if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//     $ip = $_SERVER['HTTP_CLIENT_IP'];
// } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
// } else {
//     $ip = $_SERVER['REMOTE_ADDR'];
// }
// $currentPage = basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="style/new-style.css">
    <title>Login</title>
    <style>
    </style>
</head>

<body class="container">
    <section class="login">
        <h1>Please login</h1>
        <form action="authenticate.php" method="post">
            <label for="username">
                <p>Username:</p>
                <input type="text" name="username" id="username"><br>
            </label>
            <label>
                <p>Password:</p>
                <input type="password" name="password" id="password"><br>
            </label>
            <br>
            <input type="submit" value="Login">
            <?php
            // If user puts in wrong credentials the user gets a error message
            if (isset($_GET["error"]) == "incorrectcred" ) {
            echo '<p>Wrong username and or password!</p>';
            }
            ?>
        </form>

    </section>
</body>

</html>
