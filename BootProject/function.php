<?php
// database connection
require_once('conn.php');

function totalObjects($conn) {
// This shows the total markers placed on the map
$sql1 = "SELECT COUNT(DISTINCT id) as 'aantal' FROM markers ORDER BY affiliation";
$stmt = mysqli_query($conn, $sql1);

while ($row = mysqli_fetch_assoc($stmt)) {
    echo "Total objects: ".$row['aantal']."<br>";
  }
}
function objectAffiliation($conn) {
// This shows the total markers on the map by affiliation
$sql2 = "SELECT affiliation, COUNT(affiliation) AS 'aantal' FROM markers GROUP BY affiliation;";
$stmt = mysqli_query($conn, $sql2);

while ($row = mysqli_fetch_assoc($stmt)) {
    echo "".$row['affiliation']. " Objects: ".$row['aantal']."<br>";
 }
}
function visibleMarkers($conn) {
// This shows the amount of visible and invisible markers
$sql3 = "SELECT (SELECT COUNT(*) FROM markers WHERE public = 1) AS 'Visible',
(SELECT COUNT(*) FROM markers WHERE public = 0) AS 'Invisible'";
$stmt = mysqli_query($conn, $sql3);

while ($row = mysqli_fetch_assoc($stmt)) {
    echo "Visible: ".$row['Visible'].  " Invisible: ".$row['Invisible']."<br>";
 }
}
function destroyedObjects($conn) {
// This shows how much objects have been destroyed
$sql4 = "SELECT COUNT(*) AS 'DestroyedObjects' FROM markers WHERE destroyed = 1";
$stmt = mysqli_query($conn, $sql4);

while ($row = mysqli_fetch_assoc($stmt)) {
    echo "Destroyed: ".$row['DestroyedObjects']."<br>";
 }
}
function obstaclesOnMap($conn) {
// Shows the amount of unique obstacles placed on the map
$sql5 = "SELECT object, COUNT(*) AS 'objects' FROM markers GROUP BY object";
$stmt = mysqli_query($conn, $sql5);

while ($row = mysqli_fetch_assoc($stmt)) {
    echo "Obstacle sort: ".$row['object'].  " Amount: ".$row['objects']."<br>";

 }
}
function totalUsers($conn) {
// Shows total unique users
$sql6 = "SELECT COUNT(*) AS 'TotalUsers' FROM users";
$stmt = mysqli_query($conn, $sql6);
    
while ($row = mysqli_fetch_assoc($stmt)) {
    echo "Total users: ".$row['TotalUsers']."<br>";
    
 } 
}
function rawData($conn) {
 //   
$sql7 = "SELECT * FROM markers INNER JOIN tbolocations ON markers.id = tbolocations.markerID LIMIT 1";
$stmt = mysqli_query($conn, $sql7);

while ($row = mysqli_fetch_assoc($stmt)) {
    echo "User ID: ".$row['id']. 
        " Username: " .$row['author']. 
        " Object type: ".$row['object']. 
        " Public: ".$row['public'].
        " Date: ".$row['date'].
        " Time: ".$row['time'].
        " Marker ID: ".$row['markerID'].
        "<br>";

 }
}
