<?php
require 'includes/cms_auth.inc.php';
require 'conn.php';
$sql = "SELECT objectID, objecttype, img FROM objects";
$result = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/new-style.css">
    <title>Objects</title>
    <style>
        html,
        body {
            color: #fff;


        }

        button,
        input[type="submit"] {
            width: auto;
        }
    </style>
</head>

<body>
    <main class="container">
        <h2>View and edit objects</h2>
        <button onclick="location.href='./admindashboard.php';">Back to the dashboard</button>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Object ID</th>
                    <th>Object name</th>
                    <th>Icon</th>
                    <th>Edit object</th>
                </tr>
            </thead>
            <tbody>
                <?php $x = 1 ?>
                <form action="editObject.php" method="post">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr id="<?php echo $row['objectID']; ?>">
                            <td><?php echo $row['objectID']; ?></td>
                            <td><?php echo $row['objecttype']; ?></td>
                            <td><?php echo $row['img']; ?></td>
                            <td><input type="radio" <?php if ($x == 1) {
                                                        echo 'checked="checked"';
                                                    }
                                                    $x = $x + 1; ?>name="radioID" value=<?php echo "'" . $row['objectID'] . "'" ?>></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
        <input type="submit" value="Edit"><br>
        </form>
        <?php
        if (isset($_POST['SubmitEdit'])) {
            //create variables
            $editID = $_POST['objectID'];
            $editName = $_POST['objecttype'];
            $editImg = $_POST['img'];
            //check conn
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //prepare and bind
            $stmt = $conn->prepare("UPDATE objects SET objecttype = ?, img = ?
        WHERE objectID = ?");
            $stmt->bind_param("sss", $editName, $editImg, $editID);
            if ($stmt->execute()) {
                echo "The data of object '" . $editName . "' has been succesfully changed  .";
                header("Refresh:0");
            } else {
                echo "Something went wrong!";
            }
        }
        if (isset($_POST['DeleteObject'])) {
            //create variables
            $ID = $_POST['objectID'];
            //check conn
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //prepare and bind
            $stmt = $conn->prepare("DELETE FROM objects WHERE objectID = ?");
            $stmt->bind_param("i", $ID);
            if ($stmt->execute()) {
                echo "Object has been deleted succesfully! .";
                header("Refresh:0");
            } else {
                echo "Something went wrong!";
            }
        }
        ?>
        <hr>
        <h2>Add object </h2>
        <form action="add_cms.php" method="post">
            <p>Object name/type: <input type="text" name="addType" required></p>
            <p>Object icon:<input required type="text" name="addImg" placeholder="icon.png"></p>
            <input type="submit" value="Toevoegen" name="SubmitAddObject"><br>
        </form><br>
    </main>
</body>

</html>
