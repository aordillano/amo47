<?php
    require_once('database.php');

    $query = 'SELECT * FROM categories';
    $statement = $db->prepare($query);
    $statement->execute();
    $cols = $statement->fetchAll();
    $statement->closeCursor();

    foreach ($cols as $col) :
        echo $col['categoryID'];
        echo "<br>";
        echo $col['categoryName'];
        echo "<br>";
    endforeach;
?>