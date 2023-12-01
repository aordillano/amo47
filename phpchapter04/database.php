<?php
    // Slide 24
    $local_dsn = 'mysql:host=localhost;port=3306;dbname=my_guitar_shop1';
    $local_username = 'mgs_user';
    $local_password = 'pa55word';

    //create variables for NJIT server
    $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=amo47';
    $njit_username = 'amo47';
    $njit_password = 'jungShooktd27*';

    $dsn = $local_dsn;
    $username = $local_username;
    $password = $local_password;

    try {
        $db = new PDO($dsn, $username, $password);
        echo '<p>You are connected to the database!</p>';
    } catch(PDOException $exception) {
        $error_message = $exception->getMessage();
        include("database_error.php");
        exit();
    }
?>