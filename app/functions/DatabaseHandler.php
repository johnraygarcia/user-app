<?php namespace app\functions;

use Exception;
use PDO;

class DatabaseHandler {

    public $db;

    public function __construct($dsn = NULL, $user = NULL, $password = NULL) {
        if ($this->db === null) {
            $this->db = Registry::get('db');
            if (is_null($this->db)) {
                $maxRetries = 7;
                $fails = 0;
                while (true) {
                    try {

                        $dsn = is_null($dsn) ? DB_DSN : $dsn;
                        $user = is_null($user) ? DB_USER : $user;
                        $password = is_null($password) ? DB_PASSWORD : $password;

                        $this->db = new PDO($dsn, $user, $password);
                        break;
                    } catch (\PDOException $ex) {
                        if (stripos(DB_DSN, 'sqlsrv:') !== false && ($ex->getCode() == '08S01' || stripos($ex->getMessage(), 'Communication link failure') !== false)) {
                            try {
                               $this->db = new PDO(rtrim(DB_DSN, ';') . ';ConnectionPooling=0');
                               break;
                            } catch (\PDOException $exc) {
                                throw $exc;
                            }
                        }
                        if (++$fails >= $maxRetries) {
                            throw new Exception("Connection error! Check your credentials");
                        }
                        usleep(500000);
                    }
                }
                Registry::set('db', $this->db, true);
            }
        }
    }


    public function create_user( $email, $displayName, $password) {
        $query = "
            INSERT INTO Account(EmailAddress, DisplayName, Password) VALUES(?, ?, ?)
        ";

        $stmnt = $this->db->prepare($query);
        $stmnt->execute([
            $email, $displayName, $password
        ]);

        if ($stmnt) {
            // Set sesssion message user created
            echo "user created";
        }
    }

    public function processLogin($email, $password) {

        $query = "SELECT * FROM Account WHERE [EmailAddress]=?";
        $stmnt = $this->db->prepare($query);
        $stmnt->execute([
            $email
        ]);

        $row = $stmnt->fetch();

        if (count($row)) {
            if (password_verify($password, $row['Password'])) {

                $_SESSION['AccountID'] = $row['AccountID'];
                $_SESSION['DisplayName'] = $row['DisplayName'];
                return true;
            }
        }

        return false;
    }

    public function getUsers() {
        $query = "SELECT * FROM Account";
        $stmnt = $this->db->prepare($query);
        $stmnt->execute();
        $rows = $stmnt->fetchAll();
        return $rows;
    }
}