<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Casino royale - rock, paper, scissors</title>
</head>

<body>
  <form method="post" id="myform">
    <label ><input type="checkbox" name="game" id="game" value="rock" />rock </label><br /><br />
    <input type="checkbox" name="game" id="game" value="paper" />paper <br /><br />
    <input type="checkbox" name="game" id="game" value="siccors" />siccors <br /><br />
    <button type="submit" name="draw">Draw!</button>    
  </form>

    <p class="result">You just chose: <?php if (isset($_POST["draw"])) {echo $_POST["game"];}?>
    <br><br>
        Your opponent chose: <?php if (isset($_POST["draw"])) {echo $game->skynet(); }?>
    <br><br>
        Result is: <?php if (isset($_POST["draw"])) {echo $game->result;}
                ?>
  </p>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    $("input:checkbox").on('click', function () {
      // in the handler, 'this' refers to the box clicked on
      var $box = $(this);
      if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
      } else {
        $box.prop("checked", false);
      }
    });

    
  </script>


</body>

</html>