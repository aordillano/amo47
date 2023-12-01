<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php
    require_once('database.php');

    // Matches password inputted by the user to the password in the shoeManagers table
    // based on email inputted by the user
    function is_valid_admin_login($email, $password) {
        $db = getDB();
        $query = 'SELECT password FROM shoeManagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        if($row === false) {
            return false;
        } else {
            $hash = $row['password'];
            return password_verify($password, $hash);
        }
    }
?>