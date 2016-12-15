<?php

function formatPrice($price) {
	$price = (string)$price;
	$price = explode('.', $price);

	if(isset($price[1])) {
		if((int)$price[1] < 10) $price[1] = $price[1] . '0';
		$price = $price[0] . '.' . $price[1];
	} else {
		$price = $price[0] . '.-';
	}

	return (string)$price;
}

if(!isset($_GET['id'])) {
	header("Location: ?p=home");
	die();
} else {
	$filmid = $_GET['id'];
}

include('app/model/showFilm.php');

if(isset($_SESSION['user'])) {
	$vote = new Vote($filmid, $_SESSION['user']->getUserId());

	if(isset($_POST['vote']) AND !empty($_POST['vote'])) {
		$vote->setVote($_POST['vote']);
	}
}

$film = new Film($filmid);

if(isset($_POST['text']) AND isset($_SESSION['user'])) {
	createComment($film->getFilmId(), $_SESSION['user']->getUserId(), $_POST['text']);
}

$comments = new Comments($filmid);
if($film->getBandeAnnonceURL() != NULL) $youtube = new Youtube($film->getBandeAnnonceURL());

$emotes = json_decode(file_get_contents('db/emotes.json'));

include('app/view/showFilm.php');

?>
