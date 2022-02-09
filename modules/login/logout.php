<?php
session_start();
session_unset();
// Redirect to the login page:
header('Location: index.php');
?>