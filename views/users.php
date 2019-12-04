<?php
require_once "./partials/template.php";

  ?>
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Users</h1>
      <p>This is a website using native php.</p>
    </div>
  </div>

  <div class="container">

  <?php
    $successMsg = $_SESSION['login_success'] ?? null;
    if ($successMsg) :
  ?>
    <div class="alert alert-success" role="alert">
      <?= $successMsg ?>
    </div>
    <?php endif; ?>
    <form action="" method="POST">
      <div class="user">

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Display Name</th>
              <th scope="col">Email</th>
              <th scope="col">Created</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($users as $user) :
                $dateTime = new DateTime($user['Created']);
            ?>
              <tr>
                <th scope="row"><?= $user['AccountID'] ?></th>
                <td><?= $user['DisplayName'] ?></td>
                <td><?= $user['EmailAddress'] ?></td>
                <td><?= $dateTime->format("Y-m-d") ?></td>
              </tr>
            <?php endforeach; ?>

        </table>
      </div>
    </form>
  </div>

