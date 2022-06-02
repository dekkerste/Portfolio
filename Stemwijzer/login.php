<?php
include "header.php";
include_once "includes/dbconnection.inc.php";
?>
<div class="col-6 container form" style="margin-top: 50px">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <br>
    <img src="img/stemwijzer.png" alt="Stemwijzer" style="border: 3px solid #e6e6e6; height: 70%; width: 100%;">
    <br><br>
    <h1>Login</h1>
    <form action="includes/authenticate.inc.php" method="post" autocomplete="off">
        <br>
        <label for="keyName">
            <p class="fas fa-user"> Code</p>
        </label>
        <input class="form-control" type="text" name="keyName" placeholder="code" id="keyName" required>
        <br>
        <input class="btn btn-primary" style="width: 100%" type="submit" value="login">
        <br><br>
    </form>
</div>
<?php
include "footer.php";
?>