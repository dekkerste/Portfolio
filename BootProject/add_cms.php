<?php
    require 'includes/cms_auth.inc.php';
    require 'conn.php';
    // This query adds new users
    if(isset($_POST['SubmitAddUser'])){
        //create variables
        $name = $_POST['addName'];
        $password = $_POST['addPW'];
        $passwordVerif = $_POST['addPWverify'];
        $role = $_POST['roleAdd'];
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        //check conn
        if($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }
        //prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (name, password, role) VALUES (?,?,?)");
        $stmt->bind_param("sss", $name, $hashedpassword, $role);
        if($password == $passwordVerif){
            if ($stmt->execute()){
                header('Location: cms_users.php?error=succes');
            }else{
                header('Location: cms_users.php?error=dberror');
            }
        }else{
            header('Location: cms_users.php?error=PWnotequal');
        }
    }else{
        header('Location: index.php');
    }
    // This query adds new objects
    if(isset($_POST['SubmitAddObject'])){
        //create variables
        $objectName = $_POST['addType'];
        $objectImg = $_POST['addImg'];
        //check conn
        if($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }
        //prepare and bind
        $stmt = $conn->prepare("INSERT INTO objects (objecttype, img ) VALUES (?, ?)");
        $stmt->bind_param("ss", $objectName, $objectImg);
            if ($stmt->execute()){
                header('Location: cms_objects.php?error=succes');
            }else{
                header('Location: cms_objects.php?error=dberror');
            }
        }
?>