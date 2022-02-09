<?php
$error = '';

if (!isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = database::$oConnection->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: index.php?module=login&page=home');
        } else {
            $error = 'Incorrect username and/or password!';
            header('Location: index.php?module=login&page=login&error='. $error);
        }
    } else {
        $error = 'Incorrect username and/or password!';
        header('Location: index.php?module=login&page=login&error='. $error);
    }

	$stmt->close();
}
?>