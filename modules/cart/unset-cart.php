<?php
//unset($_SESSION['cart']) unset de session niet? ipv unset session_destroy gebruikt (logt gebruiker uit)
unset($_SESSION['cart'])    ;

header("Location: index.php");

