<!--Alieyah Ordillano, 11/03/2023, IT 202-001, Section 001 Unit 7 Assignment, amo47@njit.edu-->
<?php
    require_once('database.php');

    // Gets and filters data from user
    $shoe_category_id = filter_input(INPUT_POST, 'shoe_category_id', FILTER_VALIDATE_INT);
    $shoe_code = filter_input(INPUT_POST, 'shoe_code');
    $shoe_name = filter_input(INPUT_POST, 'shoe_name');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $MAX_PRICE = 150.00;
    
    // Validating inputs
    // To check if shoe category id is empty
    if($shoe_category_id == NULL) {
        $error_message = '<p>You must put a shoe category.</p>';
    // To check if shoe category id is invalid
    } else if($shoe_category_id == FALSE) {
        $error_message = '<p>Invalid shoe category data. Check fields and try again.</p>';
    // To check if shoe code is empty
    } else if($shoe_code == NULL) {
        $error_message = '<p>You must put a shoe code.</p>';
    // To check if shoe name is empty
    } else if($shoe_name == NULL) {
        $error_message = '<p>You must put a shoe name.</p>';
    // To check if price is empty
    } else if($price == NULL) {
        $error_message = '<p>You must put a shoe price.</p>';
    // To check if price is invalid
    } else if($price == FALSE) {
        $error_message = '<p>Invalid shoe price. Check fields and try again.</p>';
    // To check if price is positive
    } else if($price <= 0) {
        $error_message = '<p>Shoe price must be at least 0.</p>';
    // To check if price is above maximum price
    } else if($price > $MAX_PRICE) {
        $error_message = '<p>Shoe price must be at most $' . $MAX_PRICE . '.</p>';
    // To check if shoe item is already in the system
    } else if(duplicate_exists($shoe_code)) {
        $error_message = '<p>Shoe item is already in database. Check fields and try again.</p>';
    } else {
        $error_message = '';
        // Adds shoe item to database by sending in a query
        $db = getDB();
        $query = 'INSERT INTO shoes (shoeCategoryID, shoeCode, shoeName, description, price, dateAdded)
        VALUES (:shoe_category_id, :shoe_code, :shoe_name, :description, :price, NOW())';
        $statement = $db->prepare($query);
        $statement->bindValue('shoe_category_id', $shoe_category_id);
        $statement->bindValue('shoe_code', $shoe_code);
        $statement->bindValue('shoe_name', $shoe_name);
        $statement->bindValue('description', $description);
        $statement->bindValue('price', $price);
        $statement->execute();
        $statement->closeCursor();
    }
        
    // Method to check that there are no duplicate shoe items
    function duplicate_exists($pass_code) {
        $shoe_code = $pass_code;

        $db = getDB();
        $query = 'SELECT * FROM shoes WHERE shoeCode = :shoe_code';
        $statement = $db->prepare($query);
        $statement->bindValue('shoe_code', $shoe_code);
        $statement->execute();
        $item = $statement->fetch();
        $statement->closeCursor();

        // If item pulled from table is not empty, shoe item already exists
        if($item != NULL) {
            return true;
        } else {
            return false;
        }
    }

    // Displays process status, showing error if there's any
    if($error_message != '') { 
        echo $error_message; 
    } else { 
        echo '<p>You have successfully added shoe item to the database!</p>';
    }

    // Goes back to original php page
    include('create.php');

?>