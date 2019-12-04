<?php
require_once "../partials/template.php";
function get_content()
{
  ?>
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Profile</h1>
      <p>This is a website using native php.</p>
    </div>
  </div>

  <div class="container">
    <form action="" method="POST">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
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

        </div>
      </div>

      <div class="d-block text-center py-4">
        <button type="submit" class="btn btn-primary btn-block">Edit Profile</button>
      </div>

    </form>
  </div>

<?php } ?>