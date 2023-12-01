<?php
    //get the data from the request
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
?>
<html>
    <head>
        <title>Name Test</title>
    </head>
    <body>
        <h2>Welcome</h2>
        <p>First Name: <?php echo $first_name; ?></p>
        <p>Last Name: <?php echo $last_name; ?></p>
    </body>
</html>