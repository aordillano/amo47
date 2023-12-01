<?php
    //Slide 38
    require_once('database.php');
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<html>
    <head>
        <title>My Guitar Shop</title>
    </head>
    <!-- Slide 39 -->
    <body>
        <h1>Product Manager</h1>
        <main>
            <h1>Add Product</h1>
            <form action="add_product.php" method="post">
                <label>Category: </label>
                <select name="category_id">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <!-- Slide 40 -->
                <label>Product Code: </label>
                <input type="text" name="code" />
                <br>
                <label>Product Name: </label>
                <input type="text" name="name" />
                <br>
                <label>List Price: </label>
                <input type="text" name="price" />
                <br>
                <input type="submit" value="Add Product" />
            </form>
        </main>
    </body>
</html>