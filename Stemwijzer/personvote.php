<?php 
include "header.php"; 
include_once "includes/dbconnection.inc.php";
?>
<?php 
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
    $party = $_SESSION['party'];

    $sql = "SELECT * FROM partypeople WHERE party='$party'";
    $result = mysqli_query($conn,$sql);

    if(isset($_GET['name'])){
        $name = $_GET['name'];
        $test = "SELECT * FROM partypeople WHERE party='$party' AND name='$name'";
        $info = mysqli_query($conn,$test);
    }
?>
<div class="content">
    <div class="votinglocation">
        <h1>Gemeente Schagen</h1>
    </div>
    <div class="flex-container">
        <div class="list1">
            <div>
                <h1>Kandidaten <?php echo $party ?></h1>
            </div>
            <ul style="list-style-type: none;">
                <?php if(mysqli_num_rows($result) > 0){ ?>
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <?php 
                            $name = $row['name'];
                            $pos = $row['position']; 
                        ?>
                        <a href="personvote.php?name=<?php echo $name ?>" class="listbutton"><li><?php echo $name;?></li></a>
                        <hr>
                    <?php endwhile;?>
                <?php } else { echo "Er zijn geen kandidaten."; } ?>
            </ul>
        </div>
        <div class="list2">
            <div>
                <h1>Over de kandidaat</h1>
            </div>
            <h1>
                <?php
                    if(isset($_GET['name'])){
                        $name = $_GET['name'];
                        echo $name;
                    } else {
                        echo "Selecteer een kandidaat";
                    }
                ?>
            </h1>
            <p>
                <?php 
                    if(isset($_GET['name'])){
                        while($row = mysqli_fetch_array($info)):
                            $description = $row['description'];
                            $pos = $row['position'];
                            echo "Woonplaats: $description";
                            if($pos < 6){
                                ?><img src="img/candidates/<?php echo $name ?>.jpg" style="height: 100px; float: right;"><?php
                            }
                        endwhile;
                    } else {
                        echo "Er is geen kandidaat geselecteerd.";
                    }
                ?>
            </p>
        </div>
    </div>
    <div class="flex-container">
        <div class="back">
            <div>
                <a href="partyvote.php" class="button"><span>Terug</span></a>
            </div>
        </div>
        <div class="finish">
            <div>
                <?php if(isset($_GET['name'])){ ?>
                    <a href="#popup1?finish=" class="button"><span>Afronden</span></a>
                    <div id="popup1?finish=" class="overlay">
                        <div class="popup">
                            <h4>Wilt u uw stem definitief te maken?</h4>
                            <br>
                            <p style="text-align: center; font-size: larger; font-weight: bold;">Partij: <?php echo $party ?></p>
                            <p style="text-align: center; font-size: larger; font-weight: bold;">Kandidaat: <?php echo $name ?></p>
                            <br>
                            <div class="text">
                                <a href="includes/additems.php" class="button">
                                    Ja
                                    <?php 
                                        $_SESSION['candidate'] = $name;   
                                    ?>
                                </a>
                                <a href="#" class="button">Nee</a>
                            </div>
                        </div>
                    </div>
                <?php 
                    } else {  ?><a href="#" class="button" title="Kies eerst een kandidaat." style="background-color: gray; color: white;">Afronden</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php 
include "footer.php" 
?>