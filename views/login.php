<?php
require_once "./partials/template.php";
?>
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Log In</h1>
      <p>This is a website using native php.</p>
    </div>
  </div>

  <div class="container">
  <?php
    $loginError = $_SESSION['login_error'] ?? null;
    if ($loginError) :
  ?>
    <div class="alert alert-danger" role="alert">
      <?= $loginError ?>
    </div>
    <?php endif; ?>

    <?php
      $register_message = $_SESSION['register_message'] ?? null;
      if ($register_message) :
    ?>
      <div class="alert alert-success" role="alert">
        <?= $register_message ?>
      </div>
    <?php endif; ?>
    <form method="POST" action="index.php?p=process_login">
      <div class="row">
        <!-- VALIDATION -->
        <div class="col-12 text-center">
          <div class="validation"></div>
        </div>
        <!-- INPUT FIELDS -->
        <div class="col-12 col-lg-6 offset-lg-3">
          <!-- email -->
          <div class="form-group">
            <label for="EmailAddress">Email: </label>
            <input type="email" id="EmailAddress" name="EmailAddress" class="form-control">
          </div>

          <!-- password -->
          <div class="form-group">
            <label for="Password">Password: </label>
            <input type="password" id="Password" name="Password" class="form-control">
          </div>

          <!-- button -->
          <div class="form-group my-5">
            <button type="submit" class="btn btn-primary btn-block" id="btn_login">
              Sign In
            </button>
          </div>
        </div>

      </div>
    </form>
  </div>