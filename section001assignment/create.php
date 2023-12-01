<!--Alieyah Ordillano, 11/03/2023, IT 202-001, Section 001 Unit 7 Assignment, amo47@njit.edu-->
<?php
    // Gets data from database
    require_once('database.php');
    $db = getDB();
    $query = 'SELECT * FROM shoeCategories ORDER BY shoeCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $shoeCategories = $statement->fetchAll();
    $statement->closeCursor();

    // Checks if there is already any data in the input fields
    if (!isset($shoe_code))  {$shoe_code='';}
    if (!isset($shoe_name)) {$shoe_name='';}
    if (!isset($description)) {$description = '';}
    if (!isset($price)) {$price = '';}
    
    // Checks if user is logged in
    require_once('valid_admin.php');
    
    // Starts session if not set
    if (!isset($_SESSION['is_valid_admin'])) { 
        session_start();
    }
?>
<!-- Code for create page -->
<html>
    <!-- Title on tab bar and styling -->
    <head>
        <title>Create</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php 
            // includes header
            include('header.php'); 
            // includes navigation based on session status
            include('menu.php'); 
        ?>
        <main>
            <h2>Create and Add Shoe Item</h2>
            <form action="add_shoe.php" method="post">
                <label>Category: </label>
                <!-- Creates a dropdown menu for shoe categories -->
                <select name="shoe_category_id">
                    <?php foreach ($shoeCategories as $shoeCategory) : ?>
                        <option value="<?php echo $shoeCategory['shoeCategoryID']; ?>">
                            <?php echo $shoeCategory['shoeCategoryName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <!-- Input for other shoe item attributes -->
                <label>Shoe Code: </label>
                <input type="text" name="shoe_code" id="shoe_code" value="<?php echo htmlspecialchars($shoe_code); ?>" />
                <span></span>
                <br>
                <label>Shoe Name: </label>
                <input type="text" name="shoe_name" id="shoe_name" value="<?php echo htmlspecialchars($shoe_name); ?>"/>
                <span></span>
                <br>
                <label>Description: </label>
                <input type="textarea" name="description" id="description" value="<?php echo htmlspecialchars($description); ?>"/>
                <span></span>
                <br>
                <label>List Price: </label>
                <input type="text" name="price" id="price" value="<?php echo htmlspecialchars($price); ?>"/>
                <span></span>
                <br>
                <input type="button" id="add_shoe_button" value="Add Shoe" /> |
                <input type="button" id="reset_button" value="Reset" />
            </form>
        </main>
        <script src="validate_create.js"></script>
        <!-- Puts in footer -->
        <?php include('footer.php'); ?>
    </body>
</html>

    