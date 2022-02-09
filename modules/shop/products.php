<?php
$link = '';
if(!isset($_SESSION['loggedin']))
{
header("Location: index.php?module=login");
}
// print_r(implode($_SESSION['cart'])) ;
$cards = '';
$sHtml = '';
if($_SESSION['id'] == 2)
{
    $link = '<a href="index.php?module=shop&page=product-action-add">Voeg product toe</a>';
    $cards .= product::adminCards();
}
else {
    $cards .= product::cards();
}
$sHtml ='
<div class="contain">
    '. $link .'
    <h1 style="text-align: center;">All products</h1>
    '. $cards .'
    <br />
</div>
';

return $sHtml;