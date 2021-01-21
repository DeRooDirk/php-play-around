<?php
    require 'index.php';
    session_start();
   
    $action = 'new';
    if(isset($_GET['action'])) $action = $_GET['action'];
   
    if($action == 'new') {
        $_SESSION['game'] = new Blackjack();
        $_SESSION['game']->addCard('Player');
        $_SESSION['game']->addCard('Bank');
    }
   
    if($action == 'hit') {
        if($_SESSION['game']->Scores['Player'] < 21) {
            $_SESSION['game']->addCard('Player', 1);
            if($_SESSION['game']->Scores['Player'] > 21) $_SESSION['game']->playBank();
        }
    }
   
    if($action == 'stand') {
        $_SESSION['game']->playBank();
    }
   
    echo "Player Cards:<br>";
    foreach($_SESSION['game']->Cards['Player'] as $card)
     //   echo "<img src='cards/{$card['Suit'][0]}{$card['Face']}.png'>";
    echo "<br>Player Score: ".$_SESSION['game']->Scores['Player'];
   
    echo "<br><br>Bank Cards:<br>";
    foreach($_SESSION['game']->Cards['Bank'] as $card)
      //  echo "<img src='cards/{$card['Suit'][0]}{$card['Face']}.png'>";
    echo "<br>Bank Score: ".$_SESSION['game']->Scores['Bank'];
   
    // Options
    if($_SESSION['game']->Scores['Player'] < 21) echo "<br><a href='?action=hit'>[Hit]</a>";
    echo "<br><a href='?action=stand'>[Stand]</a><br><a href='?action=new'>[New]</a>";
   
    if($_SESSION['game']->GameEnd == 1)
    echo "<br>Game Result: ".$_SESSION['game']->getResult();
?>