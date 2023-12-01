<?php
    require_once('database.php');

     // Starts session if not set
     if (!isset($_SESSION['is_valid_admin'])) { 
        session_start();
    }

    $db = getDB();

    // Checks if shoe_id is set
    if (isset($_GET['shoe_id'])) {
        // Gets shoe_id from HTTP GET array
        $shoe_id = $_GET['shoe_id'];

        // Gets all data of shoe item with shoe_id from database
        $query = 'SELECT * FROM shoes WHERE shoeID = :shoe_id';
        $statement1 = $db->prepare($query);
        $statement1->bindValue(':shoe_id', $shoe_id);
        $statement1->execute();
        $shoe = $statement1->fetch();
        $shoe_category_id = $shoe['shoeCategoryID'];
        $shoe_code = $shoe['shoeCode'];
        $shoe_name = $shoe['shoeName'];
        $description = $shoe['description'];
        $price = $shoe['price'];
        $date_added = $shoe['dateAdded'];
        $statement1->closeCursor();

        // Gets shoe category name based on shoe_category_id
        $queryShoeCategory = 'SELECT * FROM shoeCategories WHERE shoeCategoryID = :shoe_category_id';
        $statement2 = $db->prepare($queryShoeCategory);
        $statement2->bindValue(':shoe_category_id', $shoe_category_id);
        $statement2->execute();
        $shoe_category = $statement2->fetch();
        $shoe_category_name = $shoe_category['shoeCategoryName'];
        $statement2->closeCursor();

        $shoe_img = 'images/' . $shoe_code . '-modified.jpg';
    }
?>
<html>
    <head>
        <title>Details</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <?php
            // includes header
            include('header.php'); 
            // includes navigation based on session status
            include('menu.php'); 
        ?>
        <main>
            <div id="shoe_details_body" style="text-align: center; align-self: center; ">
                <h2><?php echo $shoe_name; ?></h2>
                <br>
                <img id="shoe_img" src="<?php echo $shoe_img; ?>" alt="Mariposa White Sneakers" height="200" />
                <h3>Shoe ID</h3>
                <p><?php echo $shoe_id; ?></p>
                <h3>Shoe Category</h3>
                <p><?php echo $shoe_category_name . " (" . $shoe_category_id . ")"; ?></p>
                <h3>Shoe Code</h3>
                <p><?php echo $shoe_code; ?></p>
                <h3>Description</h3>
                <p><?php echo $description; ?></p>
                <h3>Price</h3>
                <p><?php echo "$" . $price; ?></p>
                <h3>Date Added</h3>
                <p><?php echo $date_added; ?></p>
            </div>
        </main>
        <!-- copy paste jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" 
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
        crossorigin="anonymous"></script>
        <!-- copy paste jQuery -->
        <script src="change_image.js"></script>
    </body>
</html>