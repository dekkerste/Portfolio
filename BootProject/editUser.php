<?php
require 'includes/cms_auth.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./style/new-style.css">
    <title>Edit user</title>
</head>
<body>
<?php
    require 'conn.php';
    if(isset($_POST['radioID'])){
        $data = $_POST['radioID'];
    }else{
        header('Location: index.php');
    }
    $sql = "SELECT * FROM users WHERE id = '" . mysqli_real_escape_string($conn,$data) . "'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
?>
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
<button onclick="location.href='./cms_users.php';">Back</button>
<h2>Edit user</h2>
<form action="cms_users.php" method="post" name="editDeleteForm" onsubmit="return confirm('Are you sure you want to submit your changes?');">
    <p>id: <?php echo $data; ?>
    <p>name: <input type="text" required name="name" value= <?php echo '"' . $result['name'] .'"'?>> </p>
    <p>password: <input type="password" required name="password"> </p>
    <p>role: <select required name = "role">
        <option value="0" <?php if ($result['role'] == '0') echo ' selected="selected"'; ?>>User</option>
        <option value="1" <?php if ($result['role'] == '1') echo ' selected="selected"'; ?>>Moderator</option>
        <option value="2" <?php if ($result['role'] == '2') echo ' selected="selected"'; ?>>Admin</option>
            </select>
    </p>
    <input type="hidden" name="ID" value= <?php echo '"' . $data .'"'?>>
    <input type="submit" value="Edit" name="SubmitEdit">
    <input type="submit" value="Delete" name="DeleteUser">
</form>
</main>
</body>
</html>