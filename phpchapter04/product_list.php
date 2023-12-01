<?php
    require_once('database.php');

    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    //get name for selected category
    $queryCategory = 'SELECT * FROM categories WHERE categoryID = :categoryID';
    $statement1 = $db->prepare($queryCategory);
    $statement1->bindValue(':categoryID', $category_id); //replace variable with actual value
    $statement1->execute();
    $category = $statement1->fetch();
    $category_name = $category['categoryName'];
    $statement1->closeCursor();

    // echo $category_name; // temporary print (TEST)

    //Slide 27
    //get all categories
    $queryAllCategories = 'SELECT * FROM categories ORDER BY categoryID';
    $statement2 = $db->prepare($queryAllCategories);
    $statement2->execute();
    $categories = $statement2->fetchAll();
    $statement2->closeCursor();

    //Four steps to get queries:
    //(1) prepare, (2) execute, (3) fetch, (4) close

    //temporary print (TEST)
    // echo "<pre>"; //formatting
    // print_r($categories); //like a for loop and help print out array to make it look pretty
    // echo "</pre>";

    //fetch for 1d array (1 row) and fetchAll for 2d array (2+ rows)

    //get products for selected category
    $queryProducts = 'SELECT * FROM products WHERE categoryID = :category_id ORDER BY productID';
    //create a pdo statement every time you run a query
    $statement3 = $db->prepare($queryProducts);
    $statement3->bindValue(':category_id', $category_id); //find and replace
    //go to statement, find category_id from table, and use that to replace $category_id
    $statement3-> execute();
    $products = $statement3->fetchAll();
    $statement3->closeCursor();

    //objects:
    //PDO, PDOException, PDOStatement
?>
<!-- Slide 28 -->
<html>
    <head>
        <title>My Guitar Shop</title>
        <link rel="stylesheet" href="product_list.css" />
    </head>
    <body>
        <main>
            <h1>Product List</h1>
            <aside>
                <h2>Categories</h2>
                <nav>
                    <ul>
                        <?php foreach ($categories as $category) : ?>
                            <li>
                                <a href="?category_id=<?php echo $category['categoryID'] ?>">
                                <?php echo $category['categoryName'] ?></a>
                                <!-- category_id shows up on url when you click on it -->
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <!-- Slide 29 -->
            <section>
                <h2><?php echo $category_name; ?></h2>
                <table>
                    <tr> <!-- tr - table row; th - table header -->
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                    <?php foreach ($products as $product) : 
                        //$products - 2d array, $product - 1 row in that array ?> 
                        <tr> <!-- td - table data -->
                            <td><?php echo $product['productCode']; ?></td>
                            <td><?php echo $product['productName']; ?></td>
                            <td><?php echo $product['listPrice']; ?></td>
                            <!-- Slide 36 -->
                            <td>
                                <!-- any action done needs a form -->
                                <form action="delete_product.php" method="post">
                                    <input type="hidden" name="product_id"
                                        value="<?php echo $product['productID']; ?>" />
                                    <input type="hidden" name="category_id"
                                        value="<?php echo $product['categoryID']; ?>" />
                                    <input type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </main>
    <body>
</html>