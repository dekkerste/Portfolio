<?php
    session_start();

    $key = $_SESSION['key'];
    $candidate = $_SESSION['candidate'];

    include_once "dbconnection.inc.php";
    $sql = $conn->prepare("INSERT INTO uservote (usedKey,candidate) VALUES (?, ?)");
    $sql2 = "UPDATE keyname SET count = count + 1 WHERE keyName = '$key'";
    mysqli_query($conn,$sql2);

    $sql->bind_param("ss", $key, $candidate); 
    if($sql->execute()) {
        session_destroy();
        header("location:../confirmed.php");
    } else {
        header("location: ../error.php?error=saving-failed");
    }
    $sql->close();   
    $conn->close();
?>
