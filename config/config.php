<?php
define('DB_DSN', 'sqlsrv:Server=192.168.1.3;Database=user-db');
define('DB_USER', 'johnsql');
define('DB_PASSWORD', '8London*');

$routes = [
    "login" => "views/login.php",
    "process_login" => "controllers/authenticate.php",
    "users" => "views/users.php",
    "logout" => "controllers/logout.php"
];