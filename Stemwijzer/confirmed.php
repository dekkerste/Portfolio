<?php
include "header.php";
?>
<div class="col-6 container form-2">
  <div class="confirmed-title">
    <p class="title">Klaar</p>
  </div>
  <div>
    <p class="center-1">Bedankt voor het stemmen!</p>
    <p class="center-2">U word zo automatisch uitgelogt en terug naar de home pagina gestuurd.</p>
    <br>
    <p class="center-2">U kunt ook op de 'Logout' knop drukken om meteen uit te loggen.</p>
  </div>
  <a href="index.php"><button class="btn btn-primary btn-size breakpoint">Logout</button></a>
</div>
<?php
header('Refresh: 10; URL=./index.php');
include "footer.php";
?>