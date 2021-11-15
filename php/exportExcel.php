<?php
require_once ("../init.php");
$rowHead = "";
$rowData = "";
if (!isset($_GET["export"])) {
  header("location: ../index.php");
  exit();
} else {
  $stmt = $conn->prepare("SELECT * FROM `leads` ORDER BY `callerName`");
  $stmt->execute();
  $queryResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($queryResult[0] as $queryKey => $queryValue) {
    if ($queryKey == "ID") {
      $rowHead.= '"#"';
    } else {
      $rowHead.= '"' . ucwords(trim($queryKey)) . '"';
    }
    if ($queryKey != "status") {
      $rowHead.= "\t";
    }
  }
  foreach ($queryResult as $queryKey => $queryValue) {
    if ($queryKey < $stmt->rowCount()) {
      $rowData.= "\n";
    }
    foreach ($queryValue as $arrayKey => $arrayValue) {
      if ($arrayKey == "ID") {
        $id = $queryKey + 1;
        $rowData.= '"' . $id . '"';
      } else {
        $rowData.= '"' . trim($arrayValue) . '"';
      }
      if ($arrayKey != "status") {
        $rowData.= "\t";
      }
    }
  }
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=leads" . time() . ".xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  echo $rowHead . $rowData;
}
?>
