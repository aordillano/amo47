<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php
    // Starting session and requiring necessary PHP files for admin validation
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    require_once('database.php');
    require_once('admin_db.php');
    
    // Action to identify what is needed to be done
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'show_admin_menu';
        }
    }
    
    // Forces the user to login if not logged in
    if (!isset($_SESSION['is_valid_admin'])) {
        $action = 'login';
    }

    // Perform the specified action
    switch($action) {
        case 'login':
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            if (is_valid_admin_login($email, $password)) {
                $_SESSION['is_valid_admin'] = true;
                // redirect logged in user to default page
                header("Location: http://localhost/amo47/section001assignment/home_page.php");
            } else {
                $login_message = 'Please login.';
                include('login.php');
            }
            break;
        case 'logout':
            include('logout.php');
            break;
    }

    if (!isset($_SESSION['is_valid_admin'])) {
        header("Location: http://localhost/amo47/section001assignment/login.php" );
    }
?>