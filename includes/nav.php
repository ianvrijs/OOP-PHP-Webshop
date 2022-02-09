<?php
$count = 0;
$logincheck  = '';

if(isset($_SESSION['cart']))
{
    $count = count($_SESSION['cart']);
}
    if($count == 0)
    {
        $count = '';
    }


if(!isset($_SESSION['loggedin']))
{

    $logincheck .= '<a href="index.php?module=login&page=login">Login</a>';
}
else {
    $logincheck .= '<a href="index.php?module=login&page=logout">Logout</a>';
}
$sHtml =
'<nav class="nav">
    <a class="navLink" href="index.php?module=home">home</a>
    <a class="navLink" href="index.php?module=shop">shop</a>
    <a class="navLink" href="index.php?module=contact">contact</a>
    <div class="cart">
    <div class="dropdown">
        <a class="dropbtn " href="index.php?module=login"><i class="fas fa-user">&#9662;</i></a>
        <div class="dropdown-content">
            <a href="index.php?module=login&page=home">Home</a>
            <a href="index.php?module=login&page=profile">Profile</a>
            '. $logincheck .'
        </div>
        </div>
        <a class="navLink" href="index.php?module=cart">'. $count .'<i class="fas fa-shopping-cart"></i></a>
    </div>
</nav>

<div class="header">
<br /><br />
    <h1 class="text">
        ' . $_GET['module'] . '
    </h1>
</div>
<noscript>Your browser does not support JavaScript!</noscript>
';

return $sHtml;
?>
