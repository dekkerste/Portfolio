<?php
//The file wich will be run afther the user loged in via the login.php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'conn.php';

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (empty($_POST['username'] && $_POST['password'])) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
} else if($stmt = $conn->prepare('SELECT ID, password FROM users WHERE name = ?')) {
// Bind parameters (s = string, i =     int, b = blob, etc), in our case the username is a string so we use "s"
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
// Store the result so we can check if the account exists in the database.
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();
    // Account exists, now we verify the password.
    // Note: remember to use password_hash in your registration file to store the hashed passwords.
    // if (password_verify($_POST['password'], $password)) {
    if (password_verify($_POST['password'], $password))  {
        // Verification success! User has logged-in!
        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['id'] = $id;
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
          $param_logEntry = $_SESSION['username'] . " logged in";
                          
          if(mysqli_stmt_execute($stmt))
          {
            echo "Query successfully passed! (Login log)";
          }
          else
          {
            echo "Something went wrong. Please try again later. (Login log)";
          }
        }
      // Close connection
      mysqli_close($conn);
    }
        header('location: index.php');
        exit;
    } else {
        // Incorrect password
        header('location: login.php?error=incorrectcred');
    }
} else {
    // Incorrect username
    header('location: login.php?error=incorrectcred');
  }
    $stmt->close();

// // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
// if ($stmt = $conn->prepare('SELECT ID, password FROM users WHERE name = ?')) {
// }
