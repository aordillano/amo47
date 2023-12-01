<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php
    //Checks if there is already content in text fields
    if (!isset($first_name))  {$first_name='';}
    if (!isset($last_name)) {$last_name='';}
    if (!isset($street)) {$street = '';}
    if (!isset($city)) {$city = '';}
    if (!isset($state)) {$state = '';}
    if (!isset($zip_code)) {$zip_code = '';}
    if (!isset($ship_date)) {$ship_date = '';}
    if (!isset($order_number)) {$order_number = '';}
    if (!isset($weight)) {$weight = '';}
    if (!isset($length)) {$length = '';}
    if (!isset($width)) {$width = '';}
    if (!isset($height)) {$height = '';}
    if (!isset($total_value)) {$total_value = '';}

    require_once('valid_admin.php');
?>
<html>
    <head>
        <!-- Title of page -->
        <title>Shipping</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
            // Includes header
            include('header.php'); 

            // Includes navigation based on session status
            include('menu.php'); 

            //Checks if there is error and directs user back to
            //shipping page with error message
            if (!empty($error_message)) {
                echo $error_message;
            }
        ?>
        <!-- Displays inputted values and creates shipping label -->
        <!-- Divided into divs for easy formatting -->
        <form id="shipping_page" action="confirmation.php" method="post">
            <div id="to_address">
                <p>Ship To:</p>
                <br>
                <label>First Name: </label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" />
                <br>
                <label>Last Name: </label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" />
                <br>
                <label>Street Address: </label>
                <input type="text" name="street" value="<?php echo htmlspecialchars($street); ?>" />
                <br>
                <label>City: </label>
                <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>" />
                <br>
                <label>State: </label>
                <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>" />
                <br>
                <label>Zip Code: </label>
                <input type="text" name="zip_code" value="<?php echo htmlspecialchars($zip_code); ?>" />
                <br>
            </div>
            <div id="package_input">
                <p>Shipping Details: </p>
                <label>Ship Date: </label>
                <input type="date" name="ship_date" value="<?php echo htmlspecialchars($ship_date); ?>" />
                <br>
                <label>Order Number: </label>
                <input type="number" name="order_number" value="<?php echo htmlspecialchars($order_number); ?>" />
                <br>
                <label>Total Declared Value of Package: </label>
                <input type="number" name="total_value" value="<?php echo htmlspecialchars($total_value); ?>" />
                <br>
            </div>
            <div id="package_dimensions">
                <p>Package Dimensions: </p>
                <br>
                <label>Weight</label>
                <input type="number" name="weight" value="<?php echo htmlspecialchars($weight); ?>" />
                <label> (lbs): </label>
                <br>
                <label>Length</label>
                <input type="number" name="length" value="<?php echo htmlspecialchars($length); ?>" />
                <label> (inches): </label>
                <br>
                <label>Width</label>
                <input type="number" name="width" value="<?php echo htmlspecialchars($width); ?>" />
                <label> (inches): </label>
                <br>
                <label>Height</label>
                <input type="number" name="height" value="<?php echo htmlspecialchars($height); ?>" />
                <label> (inches): </label>
                <br>
                <input id="confirm" type="submit" value="Confirm Order" />
            </div>
        </form>
        <?php include('footer.php'); ?>
    </body>
</html>