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
    <title>Edit object</title>
</head>
<body>
<?php
    require 'conn.php';
    if(isset($_POST['radioID'])){
        $data = $_POST['radioID'];
    }else{
        header('Location: index.php');
    }
    $sql = "SELECT * FROM objects WHERE objectID = '" . mysqli_real_escape_string($conn,$data) . "'";
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
<button onclick="location.href='./cms_objects.php';">Back</button>
<h2>Edit object</h2>
<form action="cms_objects.php" method="post" onsubmit="return confirm('Are you sure you want to submit your changes?');">
    <p>id: <?php echo $data; ?>
    <p>Object name/type: <input type="text" required name="objecttype" value= <?php echo '"' . $result['objecttype'] .'"'?>> </p>
    <p>Object icon: <input type="text" required name="img" value= <?php echo '"' . $result['img'] .'"'?>> </p>
    <input type="hidden" name="objectID" value= <?php echo '"' . $data .'"'?>>
    <input type="submit" value="Edit" name="SubmitEdit">
    <input type="submit" value="Delete" name="DeleteObject">
</form>
</body>
</main>
</html>