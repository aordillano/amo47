<?php
    session_start(); // always use this when using sessions
    $_SESSION = []; // clearing array out
    session_destroy();
    $login_message = 'You have been logged out.';
    include('login.php');
?>