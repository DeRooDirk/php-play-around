<?php


declare(strict_types=1);

session_start();

// Show errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load classes
require_once 'classes/GuessingGame.php';
/*
function whatIsHappening()
{

    echo '<h2>$_POST</h2>';
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    echo '<h2>$_SESSION</h2>';
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
}
// whatIsHappening();
*/
// Start the game
// As this game is rather simple, one class should be sufficient
$game = new GuessingGame();
$game->run();
require 'view.php';