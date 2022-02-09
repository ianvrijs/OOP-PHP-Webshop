<?php
$sHtml = '';

if(empty($_SESSION['cart']))
{
    $msg = "<h1 class='cartTitle'>Your cart is empty.</h1>
            <p>Start shopping<a href='index.php?module=shop'> here!</a>";
}
else {
    $msg = "
    <a href='index.php?module=cart&page=unset-cart'>Clear cart.</a>
    <h1  class='cartTitle'>Your shopping cart:</h1>
   
    ";
}

$sHtml = '
            '. $msg .'
            '. cart::cartItems() . '

            <h3>Total: &euro;'. cart::fullPrice() . '</h3>
           
';

return $sHtml;
