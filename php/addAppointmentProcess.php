<?php
require_once ("../init.php");
$data = [];
$errors = [];
if (!$_POST) {
  header("location: ../index.php");
  exit();
} else {
  foreach ($_POST as $postKey => $postValue) {
    if ($postValue) {
      $$postKey = trim(filter_var($postValue, FILTER_SANITIZE_STRING));
    } else {
      $errors[] = $postKey . " should not be empty";
    }
  }
  if ($errors) {
    // $data["status"] = false;
    // $data["message"] = $errors;
    header("location: ../addAppointment.php");
    exit();
  } else {
    $stmt = $conn->prepare("SELECT `firmName`, `firmLocation` FROM `leads` WHERE `firmName` = :firmName AND `firmLocation` = :firmLocation");
    $stmt->bindParam(':firmName', $firmName);
    $stmt->bindParam(':firmLocation', $firmLocation);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      header("location: ../viewAppointment.php");
      exit();
    }
    $attendBy = "Pending";
    $status = "Pending";
    $stmt = $conn->prepare("INSERT INTO `leads` (callingDate, callerName, firmName, firmLocation, clientName, mobileNo, appointmentDate, productType, remark, attendBy, status) VALUES (:callingDate, :callerName, :firmName, :firmLocation, :clientName, :mobileNo, :appointmentDate, :productType, :remark, :attendBy, :status)");
    $stmt->bindParam(':callingDate', $callingDate);
    $stmt->bindParam(':callerName', $callerName);
    $stmt->bindParam(':firmName', $firmName);
    $stmt->bindParam(':firmLocation', $firmLocation);
    $stmt->bindParam(':clientName', $clientName);
    $stmt->bindParam(':mobileNo', $mobileNo);
    $stmt->bindParam(':appointmentDate', $appointmentDate);
    $stmt->bindParam(':productType', $productType);
    $stmt->bindParam(':remark', $remark);
    $stmt->bindParam(':attendBy', $attendBy);
    $stmt->bindParam(':status', $status);
    if ($stmt->execute()) {
      // $data["status"] = true;
      // $data["message"] = "Data Added Successfully";
      header("location: ../viewAppointment.php");
      exit();
    } else {
      // $data["status"] = false;
      // $data["message"] = "Something went wrong";
      header("location: ../addAppointment.php");
      exit();
    }
  }
  // echo json_encode($data);
  $stmt = null;
  $conn = null;
  header("location: ../addAppointment.php");
  exit();
}
?>
