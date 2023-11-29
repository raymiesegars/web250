<?php
require_once('../private/initialize.php');

// Log out the members
$session->logout();

redirect_to(url_for('/login.php'));

?>
