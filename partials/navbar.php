<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fab fa-buysellads fa-2x"></i>
            HOME
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!-- IF NOT LOGGED IN -->
                <?php if (!isset($_SESSION['AccountID'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=login"><i class="fas fa-user-lock"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-user-plus"></i> Register</a>
                    </li>
                <?php } else { ?>
                    <!-- IF LOGGED IN -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fas fa-user-lock"></i>Welcome,
                            <?php echo $_SESSION['DisplayName']; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=logout">Logout</a>
                    </li>
                <?php  } ?>
            </ul>
        </div>
    </div>
</nav>