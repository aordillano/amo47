<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php 
    // Shows login message
    if (!isset($login_message)) {
        $login_message = 'Please login.';
    }

    if (!isset($email)) {$email = '';}
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php include('header.php'); ?>
        <main>
            <!-- Creates input -->
            <form action="authenticate.php" method="post">
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <br>
                <label>Password:</label>
                <input type="password" name="password" value="" >
                <br>
                <input type="submit" value="Login">
                <br>
                <br>
                <!-- Home page button -->
                <a href="home_page.php">Back to Home</a>
            </form>
            <p><?php echo $login_message; ?></p>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>

