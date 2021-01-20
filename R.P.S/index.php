<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);
session_start();

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'classes/RockPaperSiccors.php';

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
whatIsHappening();
// Start the game
$game = new RockPaperSiccors();
$game->run();

require 'view.php';