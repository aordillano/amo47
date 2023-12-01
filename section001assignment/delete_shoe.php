<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php 
    require_once('database.php');

    // Gets the values
    $shoe_id = filter_input(INPUT_POST, 'shoe_id', FILTER_VALIDATE_INT);
    $shoe_category_id = filter_input(INPUT_POST, 'shoe_category_id', FILTER_VALIDATE_INT);

    if($shoe_id != FALSE && $shoe_category_id != FALSE) {
        // Deletes the product from the database
        $db = getDB();
        $query = 'DELETE FROM shoes WHERE shoeID = :shoe_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':shoe_id', $shoe_id);
        $success = $statement->execute();
        $statement->closeCursor();

        echo '<p>Shoe item has been deleted successfully.</p>';
        include('shoes.php');
    }
?>