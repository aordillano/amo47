<?php 
    // Slide 37
    require_once('database.php');

    print_r($_POST);

    //get the values
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

    if($product_id != FALSE && $category_id != FALSE) {
        //delete the product from the database
        $query = 'DELETE FROM products WHERE productID = :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $success = $statement->execute();
        $statement->closeCursor();

        echo "<p>Your delete statement status is $success.</p>";
    }
?>