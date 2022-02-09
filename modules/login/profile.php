<?php
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php?module=login&page=login');
	exit;
}

$stmt = database::$oConnection->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();

$sHtml = '';

$sHtml = '
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td>' . $_SESSION['name'] . '</td>
					</tr>
					<tr>
						<td>Password:</td>
						<td>' . $password . '</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>' . $email . '</td>
					</tr>
				</table>
			</div>
		</div>
';
return $sHtml;