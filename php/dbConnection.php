<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "leads";
try {
  $conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbName, $user, $pass);
  // $conn = new PDO("mysql:host=localhost;dbname=id8542067_loankart", "id8542067_loankart", "loankart");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
  die($e->getMessage());
}
?>
