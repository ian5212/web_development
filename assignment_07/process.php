<?php

    // grab the incoming data
    $food = $_GET['food'];
    $activity = $_GET['activity'];
    $color = $_GET['color'];
    $music = $_GET['music'];

    // make sure the user filled everything out
    if ($food == 'empty' || $activity == 'empty' 
    || $color == 'empty' || $music == 'empty' ) {
        // if not, generate an error message
        header("Location: index.php?error=missingstuff");
        exit();
    }


    // if everything is OK, diagnose the character!
    $bart = 0;
    $homer = 0;
    $lisa = 0;
    $marge = 0;

    if ($food == 'bart') {
        $bart++;
    }
    else if ($food == 'homer') {
        $homer++;
    }
    else if ($food == 'lisa') {
        $lisa++;
    }
    else if ($food == 'marge'){
        $marge++;
    }
    else {
        header("Location: index.php?error=invalidcharacter");
        exit();
    }


    if ($activity == 'bart') {
        $bart++;
    }
    else if ($activity == 'homer') {
        $homer++;
    }
    else if ($activity == 'lisa') {
        $lisa++;
    }
    else if ($activity == 'marge'){
        $marge++;
    }
    else {
        header("Location: index.php?error=invalidcharacter");
        exit();
    }

    if ($color == 'bart') {
        $bart++;
    }
    else if ($color == 'homer') {
        $homer++;
    }
    else if ($color == 'lisa') {
        $lisa++;
    }
    else if ($color == 'marge'){
        $marge++;
    }
    else {
        header("Location: index.php?error=invalidcharacter");
        exit();
    }

    if ($music == 'bart') {
        $bart++;
    }
    else if ($music == 'homer') {
        $homer++;
    }
    else if ($music == 'lisa') {
        $lisa++;
    }
    else if ($music == 'marge'){
        $marge++;
    }
    else {
        header("Location: index.php?error=invalidcharacter");
        exit();
    }

    // absolute file path to our results file
    $filename = getcwd() . '/data/results.txt';


    if ($bart >= $homer && $bart >= $lisa && $bart >= $marge) {
        // store the name of the character in our text file
        file_put_contents($filename, "bart\n", FILE_APPEND);
        $chara = 'Bart';
        //header("Location: index.php?character=bart");
        setcookie('person', 'bart');
        //exit();
    }
    else if ($homer >= $bart && $homer >= $lisa && $homer >= $marge) {
        file_put_contents($filename, "homer\n", FILE_APPEND);
        $chara = 'Homer';
        //header("Location: index.php?character=homer");
        setcookie('person', 'homer');
       // exit();
    }
     else if ($marge >= $bart && $marge >= $lisa && $marge >= $homer) {
        file_put_contents($filename, "marge\n", FILE_APPEND);
        $chara = 'Marge';
        //header("Location: index.php?character=homer");
        setcookie('person', 'Marge');
       // exit();
    }
    else {
        file_put_contents($filename, "lisa\n", FILE_APPEND);
        $chara = 'Lisa';
        //header("Location: index.php?character=lisa");
        setcookie('person', 'lisa');
        //exit();
    }
 


?>

    <?php


print  "<img src = images/$chara.png style='display: block;
  margin-left: auto;
  margin-right: auto;'>
  <div style='text-align: center; font-family: Arial;'>
        <h1 > You got $chara </h1>
        <p> You can head over to results to see previous results! </p>
  </div>
        <hr>
    <div style='text-align: center; font-family: Arial;'>
        <a href = 'results.php'>
         Results
        </a>
        <br>
        <a href='index.php'>
        <button>Play again?</button>
        </a>
    </div>
    
        "
        
        ?>
  


