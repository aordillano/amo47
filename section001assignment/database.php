<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php
    function getDB() {
        // Creates variable storing destination, username, and password
        $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=amo47';
        $njit_username = 'amo47';
        $njit_password = 'jungShooktd27*';

        // Going to be used to pass values to PDO
        $dsn = $njit_dsn;
        $username = $njit_username;
        $password = $njit_password;

        // Connects to the MySQL database
        try {
            $db = new PDO($dsn, $username, $password);
        } catch(PDOException $exception) {
            $error_message = $exception->getMessage();
            include("database_error.php");
            exit();
        }

        return $db;
    }   
?>