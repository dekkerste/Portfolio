<?php
// Require the Database connect file once. $var conn is used for connection
require_once('conn.php');
session_start();
session_destroy();
// Logout logging
$sql1 = "INSERT INTO logs (userID, logEntry) VALUES (?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql1)) {
    echo "SQL statement failed (1)";
}
else 
{
    mysqli_stmt_bind_param($stmt, "ss", $param_userId, $param_logEntry);
    // Set parameters
    $param_userId = $_SESSION['id'];
    $param_logEntry = $_SESSION['username'] . " logged out";                
        if(mysqli_stmt_execute($stmt))
        {
            echo "Query successfully passed! (Logout log)";
        }
        else
        {
            echo "Something went wrong. Please try again later. (Logout log)";
        }
}
// Close connection
mysqli_close($conn);
// Redirect to the login page:
header('Location: login.php');
?>
