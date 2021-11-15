<?php
require_once ("init.php");
if (isset($_POST["getAppointment"])) {
  $orderBy = $_POST["orderBy"];
  $stmt = $conn->prepare("SELECT `ID`, `callerName`, `firmName`, `firmLocation`, `clientName`, `mobileNo`, `appointmentDate`, `remark`, `attendBy`, `status` FROM `leads` WHERE `appointmentDate` BETWEEN :startDate AND :endDate ORDER BY `$orderBy`");
  $stmt->bindParam(":startDate", $_POST["startDate"]);
  $stmt->bindParam(":endDate", $_POST["endDate"]);
} else {
  $stmt = $conn->prepare("SELECT `ID`, `callerName`, `firmName`, `firmLocation`, `clientName`, `mobileNo`, `appointmentDate`, `remark`, `attendBy`, `status` FROM `leads`");
}
$stmt->execute();
$queryResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
include_once (ROOT . "inc/header.php");
?>
<div class="container mb-5">
  <div class="row py-3">
    <a href="index.php" class="col-6 text-info text-decoration-none">Home</a>
    <a href="php/exportExcel.php?export=true" class="col-6 text-info text-decoration-none text-right">Export to Excel</a>
  </div>
  <div class="h2 text-center text-info border-bottom mb-4 pb-3">List of Appointment</div>
  <form method="post" action="viewAppointment.php">
    <div class="form-row justify-content-center my-4">
      <div class="form-group col-12 col-md-3">
        <label for="startDate">Start Date</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-calendar"></i>
            </span>
          </div>
          <input type="date" name="startDate" id="startDate" class="form-control" value="<?php echo isset($_POST['startDate']) ? $_POST['startDate'] : date("Y-m-d"); ?>">
        </div>
      </div>
      <div class="form-group col-12 col-md-3">
        <label for="endDate">End Date</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-calendar"></i>
            </span>
          </div>
          <input type="date" name="endDate" id="endDate" class="form-control" value="<?php echo isset($_POST['endDate']) ? $_POST['endDate'] : date("Y-m-d"); ?>">
        </div>
      </div>
      <div class="form-group col-12 col-md-3">
        <label for="orderBy">Order By</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-arrows-v"></i>
            </span>
          </div>
          <select name="orderBy" id="orderBy" class="custom-select">
            <option value="appointmentDate" <?php echo isset($_POST['orderBy']) ? ($_POST['orderBy'] == "appointmentDate") ? "selected" : "" : ""; ?>>Appointment Date</option>
            <option value="callerName" <?php echo isset($_POST['orderBy']) ? ($_POST['orderBy'] == "callerName") ? "selected" : "" : ""; ?>>Caller Name</option>
            <option value="firmLocation" <?php echo isset($_POST['orderBy']) ? ($_POST['orderBy'] == "firmLocation") ? "selected" : "" : ""; ?>>Firm Location</option>
            <option value="status" <?php echo isset($_POST['orderBy']) ? ($_POST['orderBy'] == "status") ? "selected" : "" : ""; ?>>Status</option>
          </select>
        </div>
      </div>
      <div class="form-group col-12 col-md-3">
        <label>&nbsp;</label>
        <button type="submit" name="getAppointment" id="getAppointment" class="btn btn-success btn-block"><i class="fa fa-check">&nbsp;</i>Get Appointment</button>
      </div>
    </div>
  </form>
  <table class="table table-hover table-bordered" id="appointmentTable">
    <thead class="text-center thead-light">
      <tr>
        <th scope="col" class="align-middle">#</th>
        <th scope="col" class="align-middle">Caller Name</th>
        <th scope="col" class="align-middle">Firm Name</th>
        <th scope="col" class="align-middle">Client Name</th>
        <th scope="col" class="align-middle">Mobile No</th>
        <th scope="col" class="align-middle">Appointment</th>
        <th scope="col" class="align-middle">Remark</th>
        <th scope="col" class="align-middle">Attend By</th>
        <th scope="col" class="align-middle">Status</th>
        <th scope="col" class="align-middle">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($queryResult as $resultKey => $resultValue): ?>
        <tr>
          <th scope="row" class="text-center align-middle"><?php echo $resultKey+1; ?></th>
          <td class="text-center align-middle"><?php echo $resultValue["callerName"]; ?></td>
          <td class="align-middle"><?php echo $resultValue["firmName"].", ".$resultValue["firmLocation"]; ?></td>
          <td class="align-middle"><?php echo $resultValue["clientName"]; ?></td>
          <td class="text-center align-middle"><a href="tel:+91<?php echo $resultValue['mobileNo']; ?>" class="text-dark text-decoration-none" style="cursor: auto;"><?php echo $resultValue["mobileNo"]; ?></a></td>
          <td class="text-center align-middle"><?php echo $resultValue["appointmentDate"]; ?></td>
          <td class="text-center align-middle"><?php echo $resultValue["remark"]; ?></td>
          <td class="text-center align-middle"><?php echo $resultValue["attendBy"]; ?></td>
          <td class="text-center align-middle"><?php echo $resultValue["status"]; ?></td>
          <td class="text-center align-middle"><a href="updateAppointment.php?id=<?php echo $resultValue['ID']; ?>" target="_blank" class="btn btn-success">Update</td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <?php include_once(ROOT."inc/footer.php"); ?>
