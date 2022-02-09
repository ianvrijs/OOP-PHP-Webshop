<?php

$id = $_GET['id'];
$item =  array_search($id,$_SESSION['cart']);

// print_r($item);
// exit;
unset($_SESSION['cart'][$item]);
header("location: index.php?module=cart&page=cart");
//remove item sloopt het script (volgorde van array kwijt :/)

return $sHtml;


