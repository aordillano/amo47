<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php
    session_start(); // Included when using sessions
    $_SESSION = []; // Clearing array out
    session_destroy(); // Ends session
    $login_message = 'You have been logged out.';
    include('login.php'); 
?>