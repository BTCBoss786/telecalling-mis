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
    header("location: ../updateAppointment.php?id=" . $updateAppointment);
    exit();
  } else {
    $stmt = $conn->prepare("UPDATE `leads` SET callingDate = :callingDate, callerName = :callerName, firmName = :firmName, firmLocation = :firmLocation, clientName = :clientName, mobileNo = :mobileNo, appointmentDate = :appointmentDate, productType = :productType, remark = :remark, attendBy = :attendBy, status = :status WHERE `ID` = :id");
    $stmt->bindParam(':id', $updateAppointment);
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
      // $data["message"] = "Data Updated Successfully";
      // header("location: ../viewAppointment.php");
      // exit(); ?>
      <script>window.close();</script>
    <?php } else {
      // $data["status"] = false;
      // $data["message"] = "Something went wrong";
      header("location: ../updateAppointment.php?id=" . $updateAppointment);
      exit();
    }
  }
  // echo json_encode($data);
  $stmt = null;
  $conn = null;
  header("location: ../updateAppointment.php?id=" . $updateAppointment);
  exit();
}
?>
