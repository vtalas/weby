<?php 
require_once 'GoogleClientWrapper.php';

$c = new GoogleClientWrapper();
$isAuthorized = $c->isAuthorized();

if (isset($_GET['code'])) {
	$c->authenticateAndSave($_GET['code']);
	header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}


if (!$isAuthorized){
	$url = $c->createAuthUrl();
	print "<h2><a class='login' href='$url'>Registruj!</a></h2>";
}
else {
	echo "<h2>Registrovano OK</h2>";
	echo 'Access Token:  '.$c->getAccessTokenId();
	echo "<br />";
	echo 'Refresh Token:  '.$c->getRefreshTokenId();
	echo "<br />";
}



$xx = "https://lh6.googleusercontent.com/-s6LDxcexfbw/UT8AmEOmKJI/AAAAAAAAAJg/SKAPslietSE/h172/DSC_0009.jpg";
$split = explode("/", $xx);
$index = count($split)-2;
if ($index > 0) {
	$split[$index] = "h999";
} 

preprint($xx);
preprint(implode("/", $split));


?>
