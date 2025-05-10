<!DOCTYPE html>
<html>
    <head>
        <title>Assignment 07</title>
        <style>
            .error {
                background-color: red;
                color: white;
                padding: 10px;
                width: 100%;
                height: 50px;
            }
        </style>
    </head>
    <body style="text-align: center; font-family: Arial;">
        <h1 >Assignment 07: Simpsons Character Quiz!</h1>
        <p>Answer the questions below to find out which 
        Simpsons character you are</p>
        <div> 
        <img src = "images/Bart.png" style="width: 175px; height: 261px;">
        <img src = "images/Homer.png" style="width: 175px; height: 261px;">
        <img src = "images/Lisa.png" style="width: 120px; height: 225px;">
        <img src = "images/Marge.png" style="width: 120px; height: 261px;">
        </div>

        <?php

            $error = $_GET['error'];
            if ($error) {

        ?>

        <div class="error">Fill out the form!</div>

        <?php
            }
        ?>
<?php
             $character = $_GET['character'];
            $filename = "";

            if ($character == 'bart') {
                $filename = 'Bart.png';
            }
            else if ($character == 'lisa') {
                $filename = 'Lisa.png';
            }
            else if ($character == 'homer') {
                $filename = 'Homer.png';
            }
            

            if ($filename) {
                print "<img src = images/$filename";
            }
?>
        <form action="process.php" method="GET">
        <div style="border: 2px solid #0000FF">
            <br>
            <div>
                Favorite food:
                <select id="food" name="food">
                    <option value="empty">Select an option</option>
                    <option value="bart">Pizza</option>
                    <option value="homer">Cake</option>
                    <option value="lisa">Apples</option>
                    <option value="marge">Porkchops</option>
                </select>
            </div>
            <br>
            <div>
                Favorite activity:
                <select id="activity" name="activity">
                    <option value="empty">Select an option</option>
                    <option value="bart">Skateboard</option>
                    <option value="marge">Cooking</option>
                    <option value="homer">Sleep</option>
                    <option value="lisa">Study</option>
                </select>
            </div>
            <br>
            <div>
                Favorite color:
                <select id="color" name="color">
                    <option value="empty">Select an option</option>
                    <option value="bart">Blue</option>
                    <option value="lisa">Purple</option>
                    <option value="marge">Green</option>
                    <option value="homer">Red</option>
                    
                </select>
            </div>
            <br>
            <div>
                Favorite type of music:
                <select id="music" name="music">
                    <option value="empty">Select an option</option>
                    <option value="marge">RnB</option>
                    <option value="homer">Rock</option>
                    <option value="lisa">Jazz</option>
                    <option value="bart">Hip-Hop</option>
                </select>
            </div>
            <input type="submit">
            <br>
        </div>
        </form>

        <a href="results.php">See Previous Results</a>
        
    </body>
</html>
