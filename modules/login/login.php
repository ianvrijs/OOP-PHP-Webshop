<?php
$error = '';
$sHtml = '';
if(isset($_GET['error'])){
    $error = htmlentities($_GET['error']);
}
$sHtml = '
<div class="login">
<h1>Login</h1>
'. $error .'<br />
<form action="index.php?module=login&page=authenticate" method="post">
    <label for="username">
        <i class="fas fa-user"></i>
    </label>
    <input type="text" name="username" placeholder="Username" id="username" required>
    <label for="password">
        <i class="fas fa-lock"></i>
    </label>
    <input type="password" name="password" placeholder="Password" id="password" required>
    <input type="password" name="password2" placeholder="Repeat password" id="password2">
    <input type="submit" value="Login"><a class="link"href="index.php?module=login&page=register">Geen account?</a>
</form>
</div>

';



return $sHtml;
?>