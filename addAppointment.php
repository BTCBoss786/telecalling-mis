<?php require_once("init.php"); ?>
<?php include_once(ROOT."inc/header.php"); ?>
<div class="container">
  <div class="py-3">
    <a href="index.php" class="text-info text-decoration-none">Home</a>
  </div>
  <div class="h2 text-center text-info border-bottom mb-4 pb-3">Add Appointment</div>
  <form method="post" action="php/addAppointmentProcess.php">
    <div class="form-row justify-content-center">
      <div class="form-group col-12 col-md-5">
        <label for="callingDate">Calling Date</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-calendar"></i>
            </span>
          </div>
          <input type="date" name="callingDate" id="callingDate" class="form-control">
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
            <option value="" selected>Select Caller Name</option>
            <option value="Other">Caller 1</option>
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
          <input type="text" name="firmName" id="firmName" class="form-control" placeholder="e.g. LoanKart">
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
          <input type="text" name="firmLocation" id="firmLocation" class="form-control" placeholder="e.g. Vapi">
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
          <input type="text" name="clientName" id="clientName" class="form-control" placeholder="e.g. John">
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
          <input type="text" name="mobileNo" id="mobileNo" class="form-control" placeholder="e.g. 9898123456">
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
          <input type="date" name="appointmentDate" id="appointmentDate" class="form-control">
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
            <option value="" selected>Select Product Type</option>
            <option value="LAP">LAP</option>
            <option value="USL">USL</option>
            <option value="CC_OD">CC/OD</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-12 col-md-10">
        <label for="remark">Remark</label>
        <textarea name="remark" id="remark" class="form-control" rows="4" placeholder="Something about business...">Turnover:
          Business:
          Bounces: </textarea>
        </div>
      </div>
      <div class="form-row justify-content-center mt-4 mb-5">
        <div class="form-group col-8 col-md-4">
          <button type="submit" id="addAppointment" class="btn btn-success btn-block"><i class="fa fa-check">&nbsp;</i>Add Appointment</button>
        </div>
      </div>
    </form>
  </div>
  <?php include_once(ROOT."inc/footer.php"); ?>
