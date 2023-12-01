<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php
    require_once('admin_db.php');
    require_once('database.php');
    $db = getDB();

    session_start();

    // Gets information that user inputted in text field
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    // Checks if the password is right
    if (is_valid_admin_login($email, $password)) {
        $_SESSION['is_valid_admin'] = true;
        echo '<p>You have successfully logged in.</p>';

        // Gets the logged in admin's first name and last name
        // and puts it in the $_SESSION array for universal access
        $query = 'SELECT * FROM shoeManagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $admin = $statement->fetch();
        $_SESSION['first_name'] = $admin['firstName'];
        $_SESSION['last_name'] = $admin['lastName'];
        $_SESSION['email'] = $admin['emailAddress'];
        $statement->closeCursor();

        include('home_page.php');
    } else {
        // If the user is not logged in, it displays error message
        if($email == NULL && $password == NULL) {
            $login_message = 'Please login.';
        } else {
            // If the password doesn't match what is in the database
            $login_message = 'Password or email is invalid. Please try again.';
        }
        include('login.php');
    }
?>