<?php

class GuessingGame
{
    public $maxGuess;
    public $secretNumber;
    public $result;
    public $guess;
    // TODO: set a default amount of max guesses
    public function __construct(int $maxGuess = 3)
    {
        // We ask for the max guesses when someone creates a game
        // Allowing your settings to be chosen like this, will bring a lot of flexibility
        $this->maxGuess = $maxGuess;
        if (!empty($_SESSION["guesses"])) {
            $this->guess = $_SESSION["guesses"];
        }
        if (!empty($_SESSION["secretNumber"])) {
            $this->secretNumber = $_SESSION["secretNumber"];
        }
    }
    public function run()
    {
        // This function functions as your game "engine"
        // It will run every time, check what needs to happen and run the according functions (or even create other classes)
        if (empty($this->secretNumber)) {
            $this->generateSecretNumber();
        }

        if (!empty($_POST["input"])) {
            //the attempts will be +1 everytime user submit a number
            $this->guess++;

            if ($_POST["input"] == $this->secretNumber) {
                $this->playerWins();
            } else if ($_POST["input"] < $this->secretNumber) {
                $this->guessHigher();
            } else if ($_POST["input"] > $this->secretNumber) {
                $this->guessLower();
            }
        }

        //if the user enter the correct number in the last attempts, 
        //the above compparasion will still run first before change to a new secret number

        $_SESSION["guesses"] = $this->guess;

        if ($this->guess == $this->maxGuess) {
            $this->playerLoses();
            $this->reset();
        }

        if (isset($_POST["reset"])) {
            $this->reset();
        }
    }

    public function generateSecretNumber()
    {
        $this->secretNumber = rand(1, 10);
        $_SESSION["secretNumber"] = $this->secretNumber;
    }

    public function playerWins()
    {
        $this->result = 'You guessed the Number!';
        $this->reset();
    }

    public function playerLoses()
    {
        $this->result = "You LOST... The secret number was : {$this->secretNumber} Better luck next Time ";
        $this->reset();
    }

    public function guessHigher()
    {
        $this->result = "Wrong... Guess hhmmm higher??";
    }

    public function guessLower()
    {
        $this->result = "Wrong again... Guess lower! Are you high ??";
    }

    public function reset()
    {
        $this->guess = 0;
        $_SESSION["guesses"] = 0;
        $this->generateSecretNumber();
    }

    public function allAttemptsUsed()
    {
        return "All attempts are used, play again?";
    }
}
