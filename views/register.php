<?php
require_once "./partials/template.php";
?>
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Sign Up</h1>
      <p>This is a website using native php.</p>
    </div>
  </div>

  <div class="container">
  <?php
    $error_password_not_match = isset($_SESSION['error_password_not_match']) ? $_SESSION['error_password_not_match'] : null;
    if ($error_password_not_match) :
  ?>
    <div class="alert alert-danger" role="alert">
      <?= $error_password_not_match ?>
    </div>
  <?php endif; ?>
    <form action="" method="POST">
      <div class="row">
        <!-- INPUT FIELDS -->
        <div class="col-12 col-lg-6 offset-lg-3">
          <!-- last name -->
          <div class="form-group">
            <label for="DisplayName">Display Name: </label>
            <input type="text" id="DisplayName" name="DisplayName" class="form-control">
            <span class="DisplayNameValidation"></span>
          </div>
          <!-- email -->
          <div class="form-group">
            <label for="EmailAddress">Email: </label>
            <input type="email" id="EmailAddress" name="EmailAddress" class="form-control">
            <span class="EmailAddressValidation"></span>
          </div>

          <!-- password -->
          <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" id="Password" name="Password" class="form-control">
            <span class="PasswordValidation"></span>
          </div>
          <!-- confirm password -->
          <div class="form-group">
            <label for="confirm">Confirm Password: </label>
            <input type="password" id="PasswordConfirm" name="PasswordConfirm" class="form-control">
            <span class="PasswordConfirmValidation"></span>
          </div>
          <!-- button -->
          <div class="form-group my-5">
            <button type="submit" class="btn btn-primary btn-block" id="btn_add_user">Register</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script type="text/javascript" src="../assets/js/register.js"></script>