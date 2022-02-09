<?php
if(isset($_GET['error']))
{
$error = $_GET['error'];
}
else{
    $error = '';
}
$sHtml = '';

$sHtml = '
    <div class="login">
    <h1> Registreer account</h1>
				' . htmlentities($error) . '
    <form action="index.php?module=login&page=createAccount" method="post">
        <input type="text" name="username" placeholder="username" required> <br />
        <input type="email" name="email" placeholder="email adres" required> <br />
        <input type="password" name="password" placeholder="wachtwoord" required> <br />
        <input type="password" name="password2" placeholder="wachtwoord2" style="display: none;"> <br />
        <input type="submit">                                                   
    </form>
';
return $sHtml;
?>