<?php namespace app\functions;

class RequestHandler {

    protected $sess;
    protected $db;
    protected $routes;

    function __construct(DatabaseHandler $db, $routes)
    {
        $this->db = $db;
        $this->routes = $routes;
    }


    function getLoggedInID() {
       return isset($_SESSION['AccountID']) ? $_SESSION['AccountID'] : null;
    }

    function checkPost() {
        $displayName = $_POST['DisplayName'] ?? null;
        $emailAddress = $_POST['EmailAddress'] ?? null;
        $password = $_POST['Password'] ?? null;
        $passwordConfirm = $_POST['PasswordConfirm'] ?? null;
        if ($displayName) {

            // Validate password
            if ($password != $passwordConfirm) {
                $_SESSION['error_password_not_match'] = "Password does not match.";
            } else {
                // hash password
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $this->db->create_user($emailAddress, $displayName, $hashedPassword);
                $_SESSION['register_message'] = "Successfully registered. Please login.";
                unset($_SESSION['error_password_not_match']);
                header("Location: index.php?p=login");
            }
        }
    }

    function getPage() {
        $uri = $_SERVER['REQUEST_URI'];
        parse_str($uri, $get_array);
        $page = reset($get_array);

        if ($page)
            return $this->routes[$page];
        return null;
    }
}