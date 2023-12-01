<html>
    <body>
    </body>

    <?php
        $cookie_name = "userid";
        $cookie_value = "87";
        $seven_days_in_seconds = 60 * 60 * 24 * 7;

        setcookie($cookie_name, $cookie_value, time() + $seven_days_in_seconds, "/");
        
        echo "Cookie named $cookie_name is set!";

        //To test, open up developer tools (Ctrl + Shift + I) and look at cookies
        //Developer tools: three dots on the top right -> more -> developer tools
    ?>
</html>