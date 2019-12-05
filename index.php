<?php
session_start();

use app\functions\DatabaseHandler;
use app\functions\RequestHandler;

require 'vendor/autoload.php';

include 'config/config.php';

$dbConn = new DatabaseHandler(DB_DSN);
$request = new RequestHandler($dbConn, $routes);

$request->checkPost();
$page = $request->getPage();

// check if already logged in
if ($request->getLoggedInID() && strpos($page, "logout") === false) {
    $users = $dbConn->getUsers();
    include 'views/users.php';
} else {

    $c = "views/register.php";
    if ($page) {
        $c = $page;
    }
    
    require_once( $c );
}