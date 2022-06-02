<?php
include "header.php";
session_start();
session_destroy();
?>
<div class="col-6 container form-2">
  <div class="error-title">
    <p class="title">Fout</p>
  </div>
  <div>
    <p class="center-1">Er is iets fout gegaan, bekijk hieronder wat het probleem is.</p>
    <p class="center-2">Om terug te gaan naar de inlog scherm druk dan op de 'login' knop.</p>
  </div>
  <?php
  if ($_SERVER["REQUEST_URI"] == "/stemwijzer/error.php?error=login-fout") {
    echo '<p class="center-1">De code die u heeft gebruikt klopt niet.</p>';
    echo '<p class="center-2">Controleer nog eens goed en probeer het nog eens!</p>';
  }
  else if ($_SERVER["REQUEST_URI"] == "/stemwijzer/error.php?error=al-gestemt") {
    echo '<p class="center-1">U heeft al gestemt.</p>';
    echo '<p class="center-2">Als u dit niet was meld dit meteen!</p>';
  }
  else {
    echo '<p class="center-1">Onbekende fout.</p>';
  }
  ?>
  <a href="login.php"><button class="btn btn-primary btn-size breakpoint">Login</button></a>
</div>
<?php
include "footer.php";
?>