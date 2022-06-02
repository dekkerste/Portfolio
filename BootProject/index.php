<?php
session_start();

//Error reporting. Should be commented out on production
error_reporting(E_ALL);
ini_set("display_errors", 1);


require_once 'conn.php';
?>

<?php

//finds the users IP adress $var ip
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}
// Redirects user to the login page if not logged in
if (!isset($_SESSION['loggedin'])) {
  header("location: login.php");
}

// This sends the data from the form to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_SESSION['loggedin'])) {
    echo "You need to be logged in to add/delete markers!";
  } else {
    $action = isset($_POST['action']) ? $_POST['action'] : null;
    switch ($action) {
      case 'add':
        if (true) {
          $object = $_POST['object'];
          $obstacle = $_POST['obstacle'];
          $inputTextName = $_POST['inputTextName'];
          $inputTextX = $_POST['inputTextX'];
          $inputTextY = $_POST['inputTextY'];
          $affiliation = $_POST['affiliation'];
          $sql1 = "INSERT INTO markers (author, name, object, affiliation) VALUES (?, ?, ?, ?)";
          $sql2 = "INSERT INTO tbolocations (lat, lng, markerID) VALUES (?, ?, ?)";
          $sql3 = "INSERT INTO logs (userID, logEntry) VALUES (?, ?)";
          $sqlx = "INSERT INTO locationhistory (lat, lng, markerID) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmt, $sql1)) {
            echo "SQL statement failed (1)";
          } else {
            if ($object == "Ship") {
              mysqli_stmt_bind_param($stmt, "ssss", $param_author, $param_inputTextName, $param_object, $param_affiliation);
            } else if ($object == "Obstacle") {
              mysqli_stmt_bind_param($stmt, "ssss", $param_author, $param_inputTextName, $param_obstacle, $param_affiliation);
              $param_obstacle = $obstacle;
            }
            // Set parameters
            $param_author = $_SESSION['username'];
            $param_object = $object;
            $param_inputTextName = $inputTextName;
            $param_affiliation = $affiliation;

            if (mysqli_stmt_execute($stmt)) {
              $currentId = mysqli_stmt_insert_id($stmt);
              echo "Query successfully passed! (Ship part1)";
            } else {
              echo "Something went wrong. Please try again later. (Ship part1)";
            }

            if (!mysqli_stmt_prepare($stmt, $sql2)) {
              echo "SQL statement failed (2)";
            } else {
              mysqli_stmt_bind_param($stmt, "sss", $param_inputTextY, $param_inputTextX, $param_currentId);
              // Set parameters
              $param_inputTextX = $inputTextX;
              $param_inputTextY = $inputTextY;
              $param_currentId = $currentId;

              if (mysqli_stmt_execute($stmt)) {
                echo "Query successfully passed! (Ship part2)";
              } else {
                echo "Something went wrong. Please try again later. (Ship part2)";
              }
            }

            if (!mysqli_stmt_prepare($stmt, $sql3)) {
              echo "SQL statement failed (3)";
            } else {
              mysqli_stmt_bind_param($stmt, "ss", $param_userId, $param_logEntry);
              // Set parameters
              $param_userId = $_SESSION['id'];
              $param_logEntry = $_SESSION['username'] . " added a marker (ID: " . $_SESSION['id'] . ") named '" .  $inputTextName . "' on Lat: " . $inputTextY . " | Lng: " . $inputTextX;

              if (mysqli_stmt_execute($stmt)) {
                echo "Query successfully passed! (Ship part3)";
                header("location: processing.php?X=" . $inputTextY . "&Y=" . $inputTextX);
              } else {
                echo "Something went wrong. Please try again later. (Ship part3)";
              }
            }

            if (!mysqli_stmt_prepare($stmt, $sqlx)) {
              echo "SQL statement failed (4)";
            } else {
              mysqli_stmt_bind_param($stmt, "sss", $param_inputTextY, $param_inputTextX, $param_currentId);
              // Set parameters
              $param_inputTextX = $inputTextX;
              $param_inputTextY = $inputTextY;
              $param_currentId = $currentId;

              if (mysqli_stmt_execute($stmt)) {
                echo "Query successfully passed! (Ship part4)";
              } else {
                echo "Something went wrong. Please try again later. (Ship part4)";
              }
            }
            // Close statement
            mysqli_stmt_close($stmt);
          }

          // Close connection
          mysqli_close($conn);
        }
        break;
      case 'delete':
        if (isset($_POST['markerDelId'])) {
          $markerId = $_POST['markerDelId'];
          $markerName = $_POST['markerDelName'];
          $sql4 = "DELETE FROM markers WHERE Id = ?";
          $sql5 = "DELETE FROM tbolocations WHERE markerID = ?";
          $sql6 = "INSERT INTO logs (userID, logEntry) VALUES (?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql4)) {
            echo "SQL statement failed";
          } else {
            mysqli_stmt_bind_param($stmt, "s", $param_markerId);
            // Set parameter
            $param_markerId = $markerId;
            if (mysqli_stmt_execute($stmt)) {
              echo "Query successfully passed! (Deletion)";
            } else {
              echo "Something went wrong. Please try again later. (Deletion)";
            }
            // Close statement
            mysqli_stmt_close($stmt);
          }
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql5)) {
            echo "SQL statement failed";
          } else {
            mysqli_stmt_bind_param($stmt, "s", $param_markerId);
            // Set parameter
            $param_markerId = $markerId;
            if (mysqli_stmt_execute($stmt)) {
              echo "Query successfully passed! (Deletion)";
            } else {
              echo "Something went wrong. Please try again later. (Deletion)";
            }
            // Close statement
            mysqli_stmt_close($stmt);
          }
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql6)) {
            echo "SQL statement failed (3)";
          } else {
            mysqli_stmt_bind_param($stmt, "ss", $param_userId, $param_logEntry);
            // Set parameters
            $param_userId = $_SESSION['id'];
            $param_logEntry = $_SESSION['username'] . " (ID: " . $_SESSION['id'] . ") deleted a marker (ID: " . $markerId . ")";

            if (mysqli_stmt_execute($stmt)) {
              echo "Query successfully passed! (Delete log)";
              header("location: processing.php");
            } else {
              echo "Something went wrong. Please try again later. (Delete log)";
            }
          }
        }
        // Close connection
        mysqli_close($conn);
        break;
      case 'publish':
        if (isset($_POST['markerPubId'])) {
          $markerId = $_POST['markerPubId'];
          $markerName = $_POST['markerPubName'];
          $sql7 = "UPDATE markers SET public = 1 WHERE Id = ?";
          $sql8 = "INSERT INTO logs (userID, logEntry) VALUES (?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql7)) {
            echo "SQL statement failed";
          } else {
            mysqli_stmt_bind_param($stmt, "s", $param_markerId);
            // Set parameter
            $param_markerId = $markerId;
            if (mysqli_stmt_execute($stmt)) {
              echo "Query successfully passed! (Publish)";
            } else {
              echo "Something went wrong. Please try again later. (Publish)";
            }
            // Close statement
            mysqli_stmt_close($stmt);
          }
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql8)) {
            echo "SQL statement failed (2)";
          } else {
            mysqli_stmt_bind_param($stmt, "ss", $param_userId, $param_logEntry);
            // Set parameters
            $param_userId = $_SESSION['id'];
            $param_logEntry = $_SESSION['username'] . " (ID: " . $_SESSION['id'] . ") published a marker (ID: " . $markerId . ")";

            if (mysqli_stmt_execute($stmt)) {
              echo "Query successfully passed! (Publish log)";
              header("location: processing.php");
            } else {
              echo "Something went wrong. Please try again later. (Publish log)";
            }
          }
        }
        // Close connection
        mysqli_close($conn);
        break;
      case 'update':
        if (isset($_POST['markerIdForm'])) {
          $markerPublic = $_POST['markerPublicForm'];
          $markerId = $_POST['markerIdForm'];
          $markerName = $_POST['markerNameForm'];
          $markerObject = $_POST['markerObjectForm'];
          $markerAffiliation = $_POST['markerAffiliationForm'];
          $markerLat = $_POST['markerLatForm'];
          $markerLng = $_POST['markerLngForm'];

          $sql9 = "UPDATE markers SET name = ?, object = ?, affiliation = ? WHERE id = ?";
          $sql10 = "UPDATE tbolocations SET lat = ?, lng = ? WHERE markerID = ?";
          $sql11 = "INSERT INTO locationhistory (lat, lng, markerID) VALUES (?, ?, ?)";
          $sqlx = "INSERT INTO logs FrID, logEntry) VALUES (?, ?)";
          if ($markerPublic == "0")
          {
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql9)) {
              echo "SQL statement failed";
            } else {
              mysqli_stmt_bind_param($stmt, "ssss", $param_markerName, $param_markerObject, $param_markerAffiliation, $param_markerId);
              // Set parameters
              $param_markerId = $markerId;
              $param_markerName = $markerName;
              $param_markerObject = $markerObject;
              $param_markerAffiliation = $markerAffiliation;
  
              if (mysqli_stmt_execute($stmt)) {
                echo "Query successfully passed! (Update)";
              } else {
                echo "Something went wrong. Please try again later. (Update)";
              }
              // Close statement
              mysqli_stmt_close($stmt);
            }
          }
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql10)) {
            echo "SQL statement failed";
          } else {
            mysqli_stmt_bind_param($stmt, "sss", $param_markerLat, $param_markerLng, $param_markerId);
            // Set parameters
            $param_markerLat = $markerLat;
            $param_markerLng = $markerLng;
            $param_markerId = $markerId;

            if (mysqli_stmt_execute($stmt)) {
              echo "Query successfully passed! (Update 2)";
              header("location: processing.php");
            } else {
              echo "Something went wrong. Please try again later. (Update 2)";
            }
          }

          if (!mysqli_stmt_prepare($stmt, $sql11)) {
            echo "SQL statement failed";
          } else {
            mysqli_stmt_bind_param($stmt, "sss", $param_markerLat, $param_markerLng, $param_markerId);
            // Set parameters
            $param_markerLat = $markerLat;
            $param_markerLng = $markerLng;
            $param_markerId = $markerId;

            if (mysqli_stmt_execute($stmt)) {
              echo "Query successfully passed! (Update 3)";
            } else {
              echo "Something went wrong. Please try again later. (Update 3)";
            }
          }

          if (!mysqli_stmt_prepare($stmt, $sqlx)) {
            echo "SQL statement failed";
          } else {
            mysqli_stmt_bind_param($stmt, "ss", $param_userId, $param_logEntry);
            // Set parameters
            $param_userId = $_SESSION['id'];
            $param_logEntry = $_SESSION['username'] . " updated a marker (ID: " . $markerId . ")";

            if (mysqli_stmt_execute($stmt)) {
              echo "Query successfully passed! (Update log)";
              header("location: processing.php");
            } else {
              echo "Something went wrong. Please try again later. (Update log)";
            }
          }
           // Close statement
           mysqli_stmt_close($stmt);
        }
        // Close connection
        mysqli_close($conn);
        break;
        case 'attack':
          if (isset($_POST['markerAttId'])) {
            $markerAttId = $_POST['markerAttId'];
            $markerAttName = $_POST['markerAttName'];

            $sql12 = "UPDATE markers SET attackstatus = 1 WHERE id = ?";
            $sqlx = "INSERT INTO logs (userID, logEntry) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql12)) {
              echo "SQL statement failed";
            } else {
              mysqli_stmt_bind_param($stmt, "s", $param_attId);
              // Set parameters
              $param_attId = $markerAttId;
              if (mysqli_stmt_execute($stmt)) {
                echo "Query successfully passed! (Attack)";
              } else {
                echo "Something went wrong. Please try again later. (Attack)";
              }
            }

            if (!mysqli_stmt_prepare($stmt, $sqlx)) {
              echo "SQL statement failed";
            } else {
              mysqli_stmt_bind_param($stmt, "ss", $param_userId, $param_logEntry);
              // Set parameters
              $param_userId = $_SESSION['id'];
              $param_logEntry = $_SESSION['username'] . " (ID: " . $_SESSION['id'] . ") ordered an attack on a marker (ID: " . $markerAttId . ")";
  
              if (mysqli_stmt_execute($stmt)) {
                echo "Query successfully passed! (Attack log)";
                header("location: processing.php");
              } else {
                echo "Something went wrong. Please try again later. (Attack log)";
              }
            }
             // Close statement
             mysqli_stmt_close($stmt);
          }
          // Close connection
          mysqli_close($conn); 
        break;
        case 'destroy':
          if (isset($_POST['markerDestroyId'])) {
            $markerDestroyId = $_POST['markerDestroyId'];
            $markerDestroyName = $_POST['markerDestroyName'];

            $sql13 = "UPDATE markers SET destroyed = 1 WHERE id = ?";
            $sqlx = "INSERT INTO logs (userID, logEntry) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql13)) {
              echo "SQL statement failed";
            } else {
              mysqli_stmt_bind_param($stmt, "s", $param_destroyId);
              // Set parameters
              $param_destroyId = $markerDestroyId;
              if (mysqli_stmt_execute($stmt)) {
                echo "Query successfully passed! (Destroy)";
              } else {
                echo "Something went wrong. Please try again later. (Destroy)";
              }
            }

            if (!mysqli_stmt_prepare($stmt, $sqlx)) {
              echo "SQL statement failed";
            } else {
              mysqli_stmt_bind_param($stmt, "ss", $param_userId, $param_logEntry);
              // Set parameters
              $param_userId = $_SESSION['id'];
              $param_logEntry = $_SESSION['username'] . " (ID: " . $_SESSION['id'] . ") destroyed a marker (ID: " . $markerDestroyId . ")";
  
              if (mysqli_stmt_execute($stmt)) {
                echo "Query successfully passed! (Destroy log)";
                header("location: processing.php");
              } else {
                echo "Something went wrong. Please try again later. (Destroy log)";
              }
            }
             // Close statement
             mysqli_stmt_close($stmt);
          }
          // Close connection
          mysqli_close($conn); 
        break;
      default:
        break;
    }
  }
}
$currentPage = basename($_SERVER['PHP_SELF']);

function login($username, $password, $ip, $conn, $currentPage)  //Also need to edited in line 28
{

  $sql = "INSERT INTO `test_log` (`id`, `page`, `username`, `log_time`, `log_action`, `log_name`, `ip`)
          VALUES (NULL, '$currentPage', '$username', current_timestamp(), 'login in', 'log', '$ip'); ";
  $conn->query($sql);
}

?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>GALSEEZ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <link rel="preload" href="style/new-style.css" as="style">
  <!-- <link rel="preload" href="styles/leaflet.css" as="style"> -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <link rel="stylesheet" href="style/new-style.css">

  <!-- leaflet js -->
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

</head>


<body class="holy-grail">
  <header>
    <div class="logo">
      <img src="images/logl.jpg">
      <!-- ---- <p>GALZEES</p> -->
    </div>
    <div class="username">
      <p>
        <?php
        if (isset($_SESSION['username'])) {
          echo 'welcome' . ' ' . $_SESSION['username'] . ' | ' . '<a href="logout.php">logout</a>';
        } else {
          echo 'you are not logged in';
        }
        $usrid = $_SESSION['id'];
        $sql = "SELECT users.role, users.ID FROM users WHERE users.ID = $usrid";
        $stmt = mysqli_query($conn, $sql);
        while($user = mysqli_fetch_assoc($stmt)){
        $_SESSION['userrole'] = $user['role'];
        
        if ($user['role'] == 1 or $user['role'] == 2) {
          // Show to Admins and mods
          echo (" | " . "<a href=\"#\" onclick=\"location.href='./admindashboard.php'\">Admin Dashboard</a>");

          
        }
      }
        ?>
      </p>
    </div>
  </header>

  <main class="holy-grail-body">

    <!-- @TODO: Add map with wite background -->
    <section id="map" class="holy-grail-content Leaflet leaflet-container leaflet-touch leaflet-grab leaflet-touch-drag leaflet-touch-zoom">
    </section>

    <aside class="hg-sidebar">
      <div>
        <fieldset>
          <legend>Add Marker</legend>
          <section id="addmarker">
            <form method="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8" onsubmit="onSubmit()">
              <input type="hidden" name="action" value="add">
              <label for="object">Object:</label><br>
              <input onClick="createMarkerForm()" type="radio" id="object1" name="object" value="Ship" required>
              <label for="object1">Ship</label><br>
              <input onClick="createMarkerForm()" type="radio" id="object2" name="object" value="Obstacle" required>
              <label for="object2">Obstacle</label><br>
              <input type="text" id="inputTextName" name="inputTextName" placeholder="Naam:" style="display: none" required>
              <input type="text" id="inputTextX" name="inputTextX" placeholder="Longitude:" style="display: none" required>
              <input type="text" id="inputTextY" name="inputTextY" placeholder="Latitude:" style="display: none" required>
              <label for="obstacle" id="obstacleTypeLabel" style="display: none">Type of obstacle: <br></label>
              <input type="radio" id="obstacle0" name="obstacle" value="Oilplatform" style="display: none" required>
              <label for="obstacle1" id="obstacle0Label" style="display: none">Oil platform <br></label>
              <input type="radio" id="obstacle1" name="obstacle" value="Windmill" style="display: none" required>
              <label for="obstacle2" id="obstacle1Label" style="display: none">Windmill <br></label>
              <label for="affiliation" id="affiliationTypeLabel" style="display: none">Affiliation: <br></label>
              <input type="radio" id="affiliation0" name="affiliation" value="Friendly" style="display: none" required>
              <label for="affiliation1" id="affiliation0Label" style="display: none">Friendly <br></label>
              <input type="radio" id="affiliation1" name="affiliation" value="Enemy" style="display: none" required>
              <label for="affiliation2" id="affiliation1Label" style="display: none">Enemy <br></label>
              <input type="radio" id="affiliation2" name="affiliation" value="Neutral/Unknown" style="display: none" required>
              <label for="affiliation3" id="affiliation2Label" style="display: none">Neutral/Unknown</label>
              <button type="submit" id="mrkbtn" style="display: none">Add to map</button>
            </form>
            <form method="POST" id="deleteForm" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8" onsubmit=<?php echo "Deleted the shit" ?>>
              <input type="hidden" name="action" value="delete">
              <input type="hidden" id="markerDelId" name="markerDelId" value="">
              <input type="hidden" id="markerDelName" name="markerDelName" value="">
            </form>
            <form method="POST" id="publishForm" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8" onsubmit=<?php echo "Published the shit" ?>>
              <input type="hidden" name="action" value="publish">
              <input type="hidden" id="markerPubId" name="markerPubId" value="">
              <input type="hidden" id="markerPubName" name="markerPubName" value="">
            </form>
            <form method="POST" id="attackForm" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8" onsubmit=<?php echo "Attacked the shit" ?>>
              <input type="hidden" name="action" value="attack">
              <input type="hidden" id="markerAttId" name="markerAttId" value="">
              <input type="hidden" id="markerAttName" name="markerAttName" value="">
            </form>
            <form method="POST" id="destroyForm" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8" onsubmit=<?php echo "Destroyed the shit" ?>>
              <input type="hidden" name="action" value="destroy">
              <input type="hidden" id="markerDestroyId" name="markerDestroyId" value="">
              <input type="hidden" id="markerDestroyName" name="markerDestroyName" value="">
            </form>
          </fieldset>
            <!-- edit marker values -->
            <div id="editMarkerDiv" hidden>
              <fieldset>
              <legend>Edit marker</legend>
                <form method="POST" id="editMarkerForm" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">
          <input type="hidden" name="action" value="update">
          <p id="publishText" style="display: none">This marker has been published. Only its position can be edited!</p>
          <input type="hidden" id="markerIdForm" name="markerIdForm">
          <input type="hidden" id="markerPublicForm" name="markerPublicForm">
          <input type="text" id="markerNameForm" name="markerNameForm" placeholder="Name:" style="display: none" required>
          <select id="markerObjectForm" name="markerObjectForm" style="display: none" required>
            <option value="Ship">Ship</option>
            <option value="Oilplatform">Oil platform</option>
            <option value="Windmill">Windmill</option>
          </select>
          <select id="markerAffiliationForm" name="markerAffiliationForm" style="display: none" required>
            <option value="Friendly">Friendly</option>
            <option value="Enemy">Enemy</option>
            <option value="Neutral/Unknown">Neutral / Unknown</option>
          </select>
          <input type="text" id="markerLatForm" name="markerLatForm" placeholder="Longitude:" style="display: none" required>
          <input type="text" id="markerLngForm" name="markerLngForm" placeholder="Latitude:" style="display: none" required>
          <button type="submit" id="markerSubmitInfo">Submit</button>
                <button onClick="cancelSubmit()">Exit</button>
            </form>
            <fieldset>
              <legend>Marker actions</legend>
              <button id="markerCourse" onClick="showCourse()">Course</button>
              <button id="markerVisibleForm" onClick="publishMarker()" disabled>Publish</button>
              <button id="markerDeleteForm" onClick="deleteMarker()" disabled>Delete</button>
              <button id="markerAttackForm" onClick="attackMarker()" disabled>Attack</button>
              <button id="markerDestroyedForm" onClick="destroyMarker()" disabled>Destroy</button>
            </fieldset>
      </div>
        </fieldset>
        </section>
        <section id="legenda">
          <fieldset>
            <legend>Legenda</legend>
            <p><span class="red">Red</span> = Enemy</p>
            <p><span class="blue">Blue</span> = Friendly</p>
            <p><span class="grey">Grey</span> = Neutral/Unknown</p>
          </fieldset>
        </section>
      </div>
            <div>
                <footer>
                  
                  <p>
                    <?php if(isset($msg)) {
                      echo $msg;
                    }
                    ?>
                  </p>
                  <p id="status"></p>
                    <p><span id="x"></span> | <span id="y"></span></p><br>
                    <p>- Made with a lot of <span title="Coffee!">☕</span> -</p>
                </footer>
            </div>
        </aside>
    </main>
    <!-- <footer>

    </footer> -->
    <script src="js/main.js"></script>
     <!-- receives mySQLi data from server and changes to JSON data -->
    </div>
  </div>
  </fieldset>
  <!-- receives mySQLi data from server and changes to JSON data -->
  <?php
  $sql = "SELECT * FROM markers INNER JOIN tbolocations ON markers.id = tbolocations.markerID";
  $result = $conn->query($sql);
  $json;

  if ($result->num_rows > 0) {
    $arrList = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $arr = array(
        "id" => $row["id"],
        "author" => $row["author"],
        "name" => $row["name"],
        "object" => $row["object"],
        "affiliation" => $row["affiliation"],
        "public" => $row["public"],
        "lat" => $row["lat"],
        "lng" => $row["lng"],
        "attackstatus" => $row["attackstatus"],
        "destroyed" => $row["destroyed"]
      );
      array_push($arrList, $arr);
    }
    $json = json_encode($arrList);
  }
  ?>

  <!-- getting tbolocations data from server and makes it to a JSON data format -->
<?php
  $sql = "SELECT `lat`, `lng`, `markerID` FROM `locationhistory`";
  $result = $conn->query($sql);
  $tboJson;

  if ($result->num_rows > 0) {
    $arrList = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $arr = array(
      "lat" => $row["lat"],
      "lng" => $row["lng"],
      "markerID" => $row["markerID"]);
      array_push($arrList, $arr);
    }
    $tboJson = json_encode($arrList);
  }
  ?>

  <!-- this is for main.js to receive php data -->
  <script>
    function getJsonData() {
      return <?php echo $json; ?>;
    }

    function getUsername() {
      return '<?php echo $_SESSION['username']; ?>';
    }
    
    function getTboLocations() {
      return <?php echo $tboJson; ?>;
    }
  </script>
  <script>
    locate();
  </script>
</body>

</html>
