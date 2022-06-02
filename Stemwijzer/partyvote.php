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
    $sql = "SELECT * FROM parties";
    $result = mysqli_query($conn,$sql);

    if(isset($_GET['partyname'])){
        $party = $_GET['partyname'];
        $test = "SELECT * FROM parties WHERE party='$party'";
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
                <h1>Partijen</h1>
            </div>
            <ul style="list-style-type: none;">
                <?php if(mysqli_num_rows($result) > 0){ ?>
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <?php $party = $row['party']; ?>
                        <a href="partyvote.php?partyname=<?php echo $party ?>" class="listbutton"><li><?php echo $party;?></li></a>
                        <hr>
                    <?php endwhile;?>
                <?php } else { echo "Er zijn geen partijen."; } ?>
            </ul>
        </div>
        <div class="list2">
            <div>
                <h1>Over de partij</h1>
            </div>
            <h1>
                <?php
                    if(isset($_GET['partyname'])){
                        $party = $_GET['partyname'];
                        ?><img src="img/<?php echo $party ?>.png" style="height: 100px; width: 100px;"><?php
                        echo "<hr>";
                    } else {
                        echo "Selecteer een partij";
                    }
                ?>
            </h1>
            <p>
                <?php 
                    if(isset($_GET['partyname'])){
                        while($row = mysqli_fetch_array($info)):
                            $description = $row['description'];
                            echo "$description";
                        endwhile;
                    } else {
                        echo "Er is geen partij geselecteerd.";
                    }
                ?>
            </p>
        </div>
    </div>
    <div class="flex-container">
        <div class="logout">
            <div>
                <a href="#popup1?logout=" class="button"><span>Log uit</span></a>
                <div id="popup1?logout=" class="overlay">
                    <div class="popup">
                        <h4>Weet u zeker dat u wilt uit loggen?</h4>
                        <br>
                        <div class="text">
                            <a href="login.php" class="button">Ja</a>
                            <a href="#" class="button">Nee</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nextvote">
            <div>
                <?php
                    if(isset($_GET['partyname'])){ ?>
                        <a href="personvote.php" class="button">
                            <span>Verder</span>
                            <?php  
                                $_SESSION['party'] = $party;   
                            ?>
                        </a>
                <?php 
                    } else {  ?><a href="#" class="button" title="Kies eerst een partij." style="background-color: gray; color: white;">Verder</a>
                <?php } ?>
           </div>
        </div>
    </div>
</div>
<?php 
include "footer.php" 
?>
