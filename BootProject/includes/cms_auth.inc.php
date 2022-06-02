<?php
    session_start();
    if(!$_SESSION["userrole"] == 2)
    {
        header("location: index.php?error=noadmin");
    };
