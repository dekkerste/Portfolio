<?php
session_start();

$key = $_POST['keyName'];

include_once "dbconnection.inc.php";

$sql = "SELECT * FROM `keyname` WHERE keyName = '$key'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
  $count = $row['count'];
  echo $count;
}

if(mysqli_num_rows($result) > 0){
  if ($count < 1) {
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['key'] = $key;
    header("location: ../partyvote.php");
  exit;
  } else if ($count > 0){
    $sql2 = "UPDATE keyname SET count = count + 1 WHERE keyName = '$key'";
    mysqli_query($conn,$sql2);
    header("location: ../error.php?error=al-gestemt");
  exit; 
  }
} else {
    header("location: ../error.php?error=login-fout");
  exit;
}
?>