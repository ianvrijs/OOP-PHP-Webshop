<?php
if($_SESSION['id'] == 2)
{
	echo '<style>
		.admin {
			display: block;
		}
		</style>
	';
}
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php?module=login&page=login');
	exit;
}
$sHtml = '';
$sHtml = '



		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, ' . $_SESSION['name'] .'!</p>
		</div>
		';
return $sHtml;