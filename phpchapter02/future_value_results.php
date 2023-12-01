<?php
    // Slide 65
    $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

    // Slide 66
    // validate our fields
    if($investment === FALSE) {
        $error_message = 'Investment must be a valid number.';
    } else if ($investment <= 0) {
        $error_message = 'Investment must be greater than zero.';
    } else if ($interest_rate === FALSE) {
        $error_message = 'Interest rate must be a valid number.';
    } else if ($interest_rate <= 0) {
        $error_message = 'Interest rate must be greater than zero.';
    } else if($years === FALSE) {
        $error_message = 'Years must be a valid number.';
    } else if ($years <= 0) {
        $error_message = 'Years must be greater than zero.';
    } else if ($years > 30) {
        $error_message = 'Years cannot be greater than 30';
    } else {
        $error_message = '';
    }

    if($error_message != '') {
        include('future_value_form.php');
        exit();
    }

    // calculate the future values
    $future_value = $investment;
    for($index = 1; $index <= $years; $index++) {
        $future_value += $future_value * $interest_rate * 0.01;
    }

    // apply formatting
    $investment_f = '$' . number_format($investment, 2);
    $yearly_rate_f = $interest_rate . '%';
    $future_value_f = '$' . number_format($future_value, 2);
?>
<!-- Slide 68-->
<html>
    <head>
        <title>Future Value Calculator</title>
    </head>
    <body>
        <h1>Future Value Calculator</h1>
        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span>
        <br>
        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span>
        <br>
        <label>Number of Years:</label>
        <span><?php echo $years; ?></span>
        <br>
        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span>
        <br>
    </body>
</html>
<!-- Test Scenarios
1. math - success
2. investment empy
3. investment negative
4. interest rate empty
5. interest rate negative
6. years empty
7. years negative
8. years > 30 -->