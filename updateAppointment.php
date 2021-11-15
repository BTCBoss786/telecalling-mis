<?php
require_once ("init.php");
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $stmt = $conn->prepare("SELECT * FROM `leads` WHERE `ID` = :id");
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  $queryResult = $stmt->fetchAll(PDO::FETCH_ASSOC) [0];
} else {
  header("location: viewAppointment.php");
  exit();
}
include_once (ROOT . "inc/header.php");
?>
<div class="container">
  <div class="py-3">
    <a href="index.php" class="text-info text-decoration-none">Home</a>
  </div>
  <div class="h2 text-center text-info border-bottom mb-4 pb-3">Update Appointment</div>
  <form method="post" action="php/updateAppointmentProcess.php">
    <div class="form-row justify-content-center">
      <div class="form-group col-12 col-md-5">
        <label for="callingDate">Calling Date</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-calendar"></i>
            </span>
          </div>
          <input type="date" name="callingDate" id="callingDate" class="form-control" value="<?php echo $queryResult['callingDate']; ?>">
        </div>
      </div>
      <div class="form-group col-12 col-md-5">
        <label for="callerName">Caller Name</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-user"></i>
            </span>
          </div>
          <select name="callerName" id="callerName" class="custom-select">
            <option value="Amisha" <?php echo $queryResult['callerName']=="Amisha" ? "selected" : ""; ?>>Amisha</option>
            <option value="Asmita" <?php echo $queryResult['callerName']=="Asmita" ? "selected" : ""; ?>>Asmita</option>
            <option value="Kerra" <?php echo $queryResult['callerName']=="Kerra" ? "selected" : ""; ?>>Kerra</option>
            <option value="Seema" <?php echo $queryResult['callerName']=="Seema" ? "selected" : ""; ?>>Seema</option>
            <option value="Other" <?php echo $queryResult['callerName']=="Other" ? "selected" : ""; ?>>Other</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-12 col-md-5">
        <label for="firmName">Firm Name</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-building"></i>
            </span>
          </div>
          <input type="text" name="firmName" id="firmName" class="form-control" placeholder="e.g. LoanKart" value="<?php echo $queryResult['firmName']; ?>">
        </div>
      </div>
      <div class="form-group col-12 col-md-5">
        <label for="firmLocation">Location</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-address-book"></i>
            </span>
          </div>
          <input type="text" name="firmLocation" id="firmLocation" class="form-control" placeholder="e.g. Vapi" value="<?php echo $queryResult['firmLocation']; ?>">
        </div>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-12 col-md-5">
        <label for="clientName">Client Name</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-vcard"></i>
            </span>
          </div>
          <input type="text" name="clientName" id="clientName" class="form-control" placeholder="e.g. John" value="<?php echo $queryResult['clientName']; ?>">
        </div>
      </div>
      <div class="form-group col-12 col-md-5">
        <label for="mobileNo">Mobile No</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-phone"></i>
            </span>
          </div>
          <input type="text" name="mobileNo" id="mobileNo" class="form-control" placeholder="e.g. 9898123456" value="<?php echo $queryResult['mobileNo']; ?>">
        </div>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-12 col-md-5">
        <label for="appointmentDate">Appointment Date</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-calendar-o"></i>
            </span>
          </div>
          <input type="date" name="appointmentDate" id="appointmentDate" class="form-control" value="<?php echo $queryResult['appointmentDate']; ?>">
        </div>
      </div>
      <div class="form-group col-12 col-md-5">
        <label for="product">Product Type</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-th-list"></i>
            </span>
          </div>
          <select name="productType" id="productType" class="custom-select">
            <option value="LAP" <?php echo $queryResult['productType']=="LAP" ? "selected" : ""; ?>>LAP</option>
            <option value="USL" <?php echo $queryResult['productType']=="USL" ? "selected" : ""; ?>>USL</option>
            <option value="CC_OD" <?php echo $queryResult['productType']=="CC_OD" ? "selected" : ""; ?>>CC/OD</option>
            <option value="Other" <?php echo $queryResult['productType']=="Other" ? "selected" : ""; ?>>Other</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-12 col-md-10">
        <label for="remark">Remark</label>
        <textarea name="remark" id="remark" class="form-control" rows="3" placeholder="Something about business..."><?php echo $queryResult['remark']; ?></textarea>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-12 col-md-5">
        <label for="attendBy">Attend By</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-user-o"></i>
            </span>
          </div>
          <select name="attendBy" id="attendBy" class="custom-select">
            <option value="Pending" <?php echo $queryResult['attendBy']=="Pending" ? "selected" : ""; ?>>Pending</option>
            <option value="John" <?php echo $queryResult['attendBy']=="John" ? "selected" : ""; ?>>John</option>
            <option value="Nitin" <?php echo $queryResult['attendBy']=="Nitin" ? "selected" : ""; ?>>Nitin</option>
            <option value="Tej" <?php echo $queryResult['attendBy']=="Tej" ? "selected" : ""; ?>>Tej</option>
            <option value="Other" <?php echo $queryResult['attendBy']=="Other" ? "selected" : ""; ?>>Other</option>
          </select>
        </div>
      </div>
      <div class="form-group col-12 col-md-5">
        <label for="status">Status</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-bookmark"></i>
            </span>
          </div>
          <select name="status" id="status" class="custom-select">
            <option value="Pending" <?php echo $queryResult['status']=="Pending" ? "selected" : ""; ?>>Pending</option>
            <option value="Follow_Up" <?php echo $queryResult['status']=="Follow_Up" ? "selected" : ""; ?>>Follow Up</option>
            <option value="Process" <?php echo $queryResult['status']=="Process" ? "selected" : ""; ?>>Process</option>
            <option value="Logged In" <?php echo $queryResult['status']=="Logged In" ? "selected" : ""; ?>>Logged In</option>
            <option value="Sanctioned" <?php echo $queryResult['status']=="Sanctioned" ? "selected" : ""; ?>>Sanctioned</option>
            <option value="Disbursed" <?php echo $queryResult['status']=="Disbursed" ? "selected" : ""; ?>>Disbursed</option>
            <option value="Rejected" <?php echo $queryResult['status']=="Rejected" ? "selected" : ""; ?>>Rejected</option>
            <option value="Not_Interested" <?php echo $queryResult['status']=="Not_Interested" ? "selected" : ""; ?>>Not Interested</option>
            <option value="Re_Appointment" <?php echo $queryResult['status']=="Re_Appointment" ? "selected" : ""; ?>>Re-Appointment</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row justify-content-center mt-4 mb-5">
      <div class="form-group col-8 col-md-4">
        <button type="submit" name="updateAppointment" id="updateAppointment" class="btn btn-success btn-block" value="<?php echo $id; ?>"><i class="fa fa-check">&nbsp;</i>Update Appointment</button>
      </div>
    </div>
  </form>
</div>
<?php include_once(ROOT."inc/footer.php"); ?>
