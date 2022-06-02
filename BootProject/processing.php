<?php
$X = $_GET["X"];
$Y = $_GET["Y"];
if(isset($X) && isset($Y))
{
    header("location: index.php?X=" . $X . "&Y=" . $Y);
}
else
{
    header("location: index.php");
}
?>