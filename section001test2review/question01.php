<html>
    <head>
        <title>Test 2 Review</title>
    </head>
    <body>
        <main>
            <form action="question01.php" method="get">
                <label>Search: </label>
                <input type="text" name="search">Search</input>
                <input type="submit" value="Submit" />
            </form>
        </main>
    </body>
</html>

<?php
    $search = filter_input(INPUT_GET, 'search');
    echo htmlspecialchars($search);

    require_once('database.php');

    $query = 'SELECT * FROM products WHERE productCode = :search OR productName = :search';
    $statement1=$db->prepare($query);
    $statement1->bindValue(':search', $search);
    $statement1->execute();
    $results = $statement1->fetchAll();
    $statement1->closeCursor();
    
    foreach ($results as $result) :
        echo $result['productCode'];
        echo $result['productName'];
    endforeach;
?>