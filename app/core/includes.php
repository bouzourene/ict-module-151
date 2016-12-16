<?php

// Classes
require_once("app/classes/log.class.php");
require_once("app/classes/user.class.php");
require_once("app/classes/comments.class.php");
require_once("app/classes/film.class.php");
require_once("app/classes/login.class.php");
require_once("app/classes/panier.class.php");
require_once("app/classes/vote.class.php");
require_once("app/classes/captcha.class.php");
require_once("app/classes/youtube.class.php");

// Démarrage de la session
session_start();

// Fichiers de config
require_once("config.php");

// Fichiers de connexion aux databases
require_once("connectDB.php");
require_once("connectUserDB.php");
