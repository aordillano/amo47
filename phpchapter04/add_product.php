<?php
    print_r($_POST); //helper function to make sure the data came through

    // Slide 41
    //get the product data
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    //validate inputs
    if($category_id == NULL || $category_id == FALSE || $code == NULL ||
        $name == NULL || $price == NULL || $price == FALSE) {
            $error = "Invalid product data. Check fields and try again.";
            echo $error;
    } else {
        require_once('database.php');

        // Slide 42
        //add product to database
        $query = 'INSERT INTO products (categoryID, productCode, productName, listPrice)
                  VALUES (:category_id, :code, :name, :price)';
        $statement = $db->prepare($query);
        $statement->bindValue('category_id', $category_id);
        $statement->bindValue('code', $code);
        $statement->bindValue('name', $name);
        $statement->bindValue('price', $price);
        $statement->execute();
        //no fetch call because you're just inserting something,
        //not getting something from the database
        $statement->closeCursor();
    }
?>