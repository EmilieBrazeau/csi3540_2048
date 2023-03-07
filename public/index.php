
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale:1.0">
        <title>2048</title>
        <link type="text/css" rel="stylesheet" href="styles.css">
        <script src="/assets/2048_game.js"></script>
        <script src="/assets/jquery.min.js"></script>
    </head>
    <body>
        <div id="backdrop">
            <h1>2048</h1>
            <hr>
            <h2>Score: <span id="score">0</span></h2>
            <div id="grid"></div>
            <h2>
                Join numbers to get to the 2048 tile!</h2>
            <p>Use arrow keys to move the tiles.
                <br> When two tiles having the same number touch, <br>they join into one.
            </p>
        </div>
        <div class = "popup" id="popupGameOver">
            <h2>Game over!</h2>
            <p>Your score :</p>
            <span id="scorePopup"></span>
            <button type = "button" onclick="tryAgain('popupGameOver')">Try again</button>
        </div>
        <div class = "popup" id="popupWon">
            <h2>You won!</h2>
            <div><button type = "button" onclick="tryAgain('popupWon')">Restart</button></div>
            <div><button type = "button" onclick="continuePlaying()">Continue playing</button></div>
        </div>
    </body>
</html>

// http://localhost:4000