<?php

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

include('app/view/showFilm.php');

?>
