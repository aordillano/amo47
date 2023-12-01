<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    <head>
    <body>
        <?php 
            if (isset($_SESSION['is_valid_admin'])) { 
                echo "<p>Welcome, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " (" . 
                $_SESSION['email'] . ")!</p>";-0
        ?>
            <nav>
                <a href="home_page.php">Home</a> | 
                <a href="shipping.php">Shipping</a> |
                <a href="shoes.php">Shoes</a> |
                <a href="create.php">Create</a> |
                <a href="logout.php">Logout</a>
            </nav>
        <?php } else {?>
            <nav>
                <a href="home_page.php">Home</a> |
                <a href="shoes.php">Shoes</a> |
                <a href="login.php">Login</a>
            </nav>
        <?php } ?>
    </body>
</html>