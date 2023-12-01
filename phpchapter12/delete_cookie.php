<?php
$cookie_name = "userid";

//set expiration date to one hour ago
$one_hour_in_seconds = 60 * 60;

setcookie($cookie_name, "", time() - $one_hour_in_seconds, "/");

echo "Cookie named $cookie_name is deleted.";

//$_COOKIE -> stored in local browser
//$_SESSION -> stored in server
?>