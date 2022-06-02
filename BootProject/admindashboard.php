<?php
    session_start();
    if(!$_SESSION["userrole"] == 2 OR !$_SESSION["userrole"] == 1)
    {
        header("location: index.php?error=noadmin");
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./style/new-style.css">
    <title>Admin dashboard</title>
    <style>
        button {
            width: auto;
        }

        .dbtitle {
            text-align: center;
            font-size: 2rem;
        }

        .dbbuttons {
            text-align: center;
        }

        .dbwrapper {
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 200px 200px;
            grid-gap: 15px;
        }

        .dbbox {
            background-color: #eee;
            border: #555;
            border-radius: 6px;
            color: black;
            text-align: center;
            font-size: 16px;
            padding: 25px;
            margin: 10px;
            display: flex;

            justify-content: center;

            align-items: center;

            flex-direction: column;
        }

        .dbbox p {
            font-size: 1.5rem;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="dbtitle">
        <h2>Admin dashboard</h2>
    </div>
    <div class="dbbuttons">
        <button onclick="location.href='./index.php';">Home</button>
        <?php

        if($_SESSION['userrole'] == 2){

        echo ("<button onclick=\"location.href='./cms_users.php'\">View & edit users</button>");

        echo ("<button onclick=\"location.href='./cms_objects.php'\">View & edit objects</button>");
        }
        ?>
        <button onclick="location.href='./logs.php';">View logs</button>
    </div>
    </div>
    <div class="dbwrapper">

        <div class="dbbox box-1">
            <p>Total markers</p>
            <?php
            // function file connection
            require_once('function.php');
            totalObjects($conn);
            objectAffiliation($conn);
            ?>
        </div>
        <div class="dbbox box-2">
            <p>Visible markers</p>
            <?php
            visibleMarkers($conn);
            ?>
        </div>

        <div class="dbbox box-3">
            <p>Destroyed markers</p>
            <?php
            destroyedObjects($conn);
            ?>
        </div>

        <div class="dbbox box-4">
            <p>Unique obstacles on map</p>
            <?php
            obstaclesOnMap($conn);
            ?>
        </div>

        <div class="dbbox box-5">
            <p>Total users</p>
            <?php
            totalUsers($conn);
            ?>
        </div>

        <div class="dbbox box-6">
            <p>Complete Data</p>
            <?php
            rawData($conn);
            ?>
        </div>
    </div>
</body>

</html>
