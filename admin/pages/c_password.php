<?php
session_start();
if (isset($_SESSION['valid'])) { 
include '../includes/header.php';
include '../includes/connection.php';
?>
<main id="main" class="main">
<?php include('../includes/response.php') ?>
  <div class="pagetitle">
    <h1>Password Setting</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>

        <li class="breadcrumb-item active">Change Passwordd</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Change Password</h5>

            <form action="action/pass_action.php" method="POST" enctype="multipart/form-data" id="changepassword">

              <div class="row mb-3">
                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                <div class="col-md-8 col-lg-6">
                  <input name="password" type="password" class="form-control" id="currentPassword" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                <div class="col-md-8 col-lg-6">
                  <input name="newpassword" type="password" class="form-control" id="newPassword" onkeyup="cnewPassword()" required>
                  <span id="error1" style="color:red; font-size:13px;"></span>
                </div>
              </div>

              <div class="row mb-3">
                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                <div class="col-md-8 col-lg-6">
                  <input name="renewpassword" type="password" class="form-control" id="renewPassword" onkeyup="rNewPassword()" required>
                  <p id="error2" style="color:red; font-size:13px;"></p>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" value="submit" name="changepass" class="btn btn-primary">Change</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="../assets/js/c_password_validate.js"></script>
<?php
include '../includes/footer.php';
}
?>