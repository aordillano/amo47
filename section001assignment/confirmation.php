<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<?php
    // Checks if user is logged in
    require_once('valid_admin.php');

    // Starts session if not set
    if (!isset($_SESSION['is_valid_admin'])) { 
        session_start();
    }

    //Gets information from $_POST array and puts them into variables
    //Gets string variables straight from the array
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    //Checks if zip code is a valid number
    $zip_code = filter_input(INPUT_POST, 'zip_code');
    //Gets date from the $_POST array
    $ship_date = $_POST['ship_date'];
    //Check if they are valid numbers
    $order_number = filter_input(INPUT_POST, 'order_number', FILTER_VALIDATE_INT);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_INT);
    $length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_INT);
    $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_INT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);
    $total_value = filter_input(INPUT_POST, 'total_value', FILTER_VALIDATE_FLOAT);

    //Validates fields based on required conditions
    //If value is no more than 150
    if($total_value > 150.0) {
        $error_message = '<p>Total declared value must be no more than $150.</p>';
    //If dimensions are no more than 36
    } else if ($length > 36 || $width > 36 || $height > 36) {
        $error_message = '<p>Dimensions must be no more than 36 inches.</p>';
    //If required text fields are empty
    } else if (empty($first_name)) {
        $error_message = '<p>First name is a required text field.</p>';
    } else if (empty($last_name)) {
        $error_message = '<p>Last name is a required text field.</p>';
    } else if (empty($street)) {
        $error_message = '<p>Street address is a required text field.</p>';
    } else if (empty($city)) {
        $error_message = '<p>City is a required text field.</p>';
    } else if (empty($state)) {
        $error_message = '<p>State is a required text field.</p>';
    //If state is 2 characters
    } else if (strlen($state) != 2) {
        $error_message = '<p>State must be two characters.</p>';
    //If zip code is empty
    } else if (empty($zip_code)) {
        $error_message = '<p>Zip code is a required text field.</p>';
    //If zip code is 5 characters
    } else if (strlen((string)$zip_code) != 5) {
        $error_message = '<p>Zip code must be five characters.</p>';
    //If the rest of the text fields are empty
    } else if (empty($ship_date)) {
        $error_message = '<p>Shipping date is a required text field.</p>';
    } else if (empty($order_number)) {
        $error_message = '<p>Order number is a required text field.</p>';
    } else if (empty($weight)) {
        $error_message = '<p>Weight is a required text field.</p>';
    } else if (empty($length)) {
        $error_message = '<p>Length is a required text field.</p>';
    } else if (empty($width)) {
        $error_message = '<p>Width is a required text field.</p>';
    } else if (empty($height)) {
        $error_message = '<p>Height is a required text field.</p>';
    } else if (empty($total_value)) {
        $error_message = '<p>Total declared value is a required text field.';
    //Else there is no error to display
    } else {
        $error_message = '';
    }

    //If there is an error, it takes them back to shipping.php and posts error message
    if($error_message != '') {
        include('shipping.php');
        exit();
    }

    //Formatted versions of numerical values
    $total_value_f = '$' . number_format($total_value, 2);
    $address = $city . ', ' . $state . ', ' . $zip_code;
    $dimensions = $length . 'x' . $width .'x' . $height . ' inches';
?>
<html>
    <head>
        <title>Confirmation</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
            // includes header
            include('header.php'); 
            // includes navigation based on session status
            include('menu.php'); 
        ?>
        <main>
            <h2>Your shipping label has been created!</h2>
            <br>
            <div class='shipping_label' id='logo'>
                <label>P</label>
            </div> 
            <div class='shipping_label' id='package_info'>
                <label>Ship Date: </label>
                <span><?php echo $ship_date; ?></span>
                <br>
                <label>Weight: </label>
                <span><?php echo $weight . ' lbs'; ?></span>
                <br>
                <label>Dimensions: </label>
                <span><?php echo $dimensions; ?></span>
                <br>
                <label>Total Declared Value: </label>
                <span><?php echo $total_value_f; ?></span>
            </div>
            <div class='shipping_label' id='shipping_info'>
                <label>USPS Priority Mail</label>
            </div>
            <div class='shipping_label' id='to_and_from'>
                <label>CynoShoes</label>
                <br>
                <label>123 Paradise St</label>
                <br>
                <label>Jersey City, NJ 07307</label>
                <br>
                <br>
                <br>
                <label>Ship To:</label>
                <br>
                <span><?php echo $first_name . ' ' . $last_name; ?></span>
                <br>
                <span><?php echo $street; ?></span>
                <br>
                <span><?php echo $address; ?></span>
                <br>
            </div>
            <div class='shipping_label' id='barcode'>
                <img src='images/barcode.PNG' alt='Tracking Number and Barcode' height='125px' 
                style="margin-left: 1em"/>
            </div>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>