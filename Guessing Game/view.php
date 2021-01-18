<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Casino royale - guessing game</title>
</head>
<form method="post" name="guessingGame">
	<h1>You get 3 guesses to guess the number. Try with a number between 1 and 10.</h1>
	<input type="text" name="input" value="" size="50"></input>
	<button type="submit" name="guess">Guess!</button>
	<button type="submit" name="reset">Restart !!</button>
</form>
<p name="result">
	<h2>Your Choice: <?php if (isset($_POST["input"])) {
                        echo $_POST["input"];
                    } ?></h2>
	<h2> Attempts: <?php if (!empty($game->guess)) {
                        echo $game->guess;
                        echo '<br>';
                        echo $game->maxGuess;
                    } else if ((isset($_POST["input"])) && ($game->guess == $game->maxGuess)) {
                        echo $game->allAttemptsUsed();
                    } ?></h2>
	<h2>Result: <?php if (!empty($game->result)) {
                    echo $game->result;
                } ?></h2>

</p>


<body>
</body>

</html>