<?php

date_default_timezone_set("UTC");

ini_set('display_errors', 'on');

error_reporting(E_ALL);

//header('Content-Type: application/json');

define("DIRECTORY", getcwd());

if(empty($_GET)){exit();}

require_once('src/blockchain.php');