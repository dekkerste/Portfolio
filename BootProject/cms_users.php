<?php
require 'includes/cms_auth.inc.php';
//get database connection information
require 'conn.php';
$sql = "SELECT id, name, ipadres, role FROM users";
//Getting the data from the sql statement and putting it in the result variable
$result = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./style/new-style.css">
    <title>Users</title>
</head>
<body>
    <main class="container">
        <style>
            body {
                background-color: #434446;
            }

            body {
                color: white;
            }

            html,
            body {
                color: #fff;
                margin: 0;


            }

            button,
            input[type="submit"] {
                width: auto;
            }
        </style>
        <h2>View and edit users</h2>
        <button onclick="location.href='./admindashboard.php';">Back to the dashboard</button>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Ip-address</th>
                    <th>Role</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // make a variable which is used to make the first radio button selected
                $x = 1
                ?>
                <form action="editUser.php" method="post">
                    <?php while ($row = mysqli_fetch_assoc($result))
                    //echo the results from the statement in a table
                    { ?>
                        <tr id="<?php echo $row['id']; ?>">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['ipadres']; ?></td>
                            <td><?php switch ($row['role']) {
                                        //echo the role of the user depending on the value
                                    case 0:
                                        echo "User";
                                        break;
                                    case 1:
                                        echo "Moderator";
                                        break;
                                    case 2:
                                        echo "Administrator";
                                        break;
                                } ?></td>
                            <td><input <?php if ($x == 1) {
                                            //make the first radio button checked
                                            echo 'checked="checked"';
                                        }
                                        $x = $x + 1; ?> type="radio" name="radioID" value=<?php echo "'" . $row['id'] . "'" ?>></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
        <input type="submit" value="Edit"><br>
        </form>

        <?php
        if (isset($_POST['SubmitEdit'])) {
            //create variables
            $editID = $_POST['ID'];
            $editName = $_POST['name'];
            $editPass = $_POST['password'];
            $hashedPass = password_hash($editPass, PASSWORD_DEFAULT);
            $editRole = $_POST['role'];
            //check conn
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //prepare and bind
            $stmt = $conn->prepare("UPDATE users SET name = ?, password = ?, role = ?
        WHERE ID = ?");
            $stmt->bind_param("sssi", $editName, $hashedPass, $editRole, $editID);
            if ($stmt->execute()) {
                echo "The data of user  '" . $editName . "'  is changed succesfully.";
                header("Refresh:0");
            } else {
                echo "Something went wrong!";
            }
        }

        if (isset($_POST['DeleteUser'])) {
            //create variables
            $ID = $_POST['ID'];
            //check conn
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //prepare and bind
            $stmt = $conn->prepare("DELETE FROM users WHERE ID = ?");
            $stmt->bind_param("i", $ID);
            if ($stmt->execute()) {
                echo "User has been deleted succesfully.";
                header("Refresh:0");
            } else {
                echo "Something went wrong!";
            }
        }
        ?>
        <hr>
        <h2>Add user</h2>
        <form action="add_cms.php" method="post">
            <p>Name: <input type="text" name="addName" required></p>
            <p>Password:<input required type="password" name="addPW"></p>
            <p>Repeat password:<input required type="password" name="addPWverify"></p>
            <p>Role: <select required name="roleAdd">
                    <option value="0">User</option>
                    <option value="1">Moderator</option>
                    <option value="2">Admin</option>
                </select></p>
            <input type="submit" value="Add" name="SubmitAddUser"><br>
        </form><br>
        <?php
        //error messages
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "succes") {
                echo "User succesfully added.";
            } else if ($_GET["error"] == "dberror") {
                echo "Something went wrong with the database.";
            } else if ($_GET["error"] == "PWnotequal") {
                echo "The passwords are not equal.";
            }
        }
        ?>
    </main>
</body>

</html>
