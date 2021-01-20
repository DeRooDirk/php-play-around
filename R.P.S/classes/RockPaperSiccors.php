<?php

class RockPaperSiccors
{
    //vars
     public $choices =array("rock","paper","siccors");
     public $result;
    

    public function run()
    {
        // This function functions as your game "engine"
        // Now it's on to you to take the steering wheel and determine how it will work

        //todo make switch
        if (isset($_POST["game"])) {
            if ($_POST["game"] == $this->skynet()) {
                $this->draw();
            } elseif ($_POST["game"] == "siccors" && $this->skynet() == "paper") {
                $this->youWin();
            } elseif ($_POST["game"] == "rock" && $this->skynet() == "siccors") {
                $this->youWin();
            } elseif ($_POST["game"] == "paper" && $this->skynet() == "rock") {
                $this->youWin();
            } else {
                $this->youLose();
            }
        }
    }

    public function skynet()
    {
        return $this->choices[array_rand($this->choices)];
    }

    public function youWin()
    {
        $this->result = "Well done";
    }

    public function youLose()
    {
        $this->result = "You lose.";
    }

    public function draw()
    {
        $this->result = " draw.";
    }
}



