
<?php include('C:\Users\Emilie Brazeau\OneDrive\Documents\École\HIV2023\CSI3540\csi3540_2048\app\models\2048Game.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale:1.0">
        <title>2048</title>
        <link type="text/css" rel="stylesheet" href="/assets/styles.css">
        <script src="/assets/2048_game.js"></script>
        <script src="/assets/jquery.min.js"></script>
    </head>
    <body>
        <div id="backdrop">
            <h1>2048</h1>
            <hr>
            <span class="score">
				score :
				<?php echo($_GET["score"]) ; ?>
			</span>
            <span class="new">
				<a href="2048Game.php">New game</a>
			</span>
            <h2>
                Join numbers to get to the 2048 tile!</h2>
            <p>Use arrow keys to move the tiles.
                <br> When two tiles having the same number touch, <br>they join into one.
            </p>

            <div class="grid">
			<table>
				<tr>
					<th class="g"><?php echo(html_tile("c11")) ;?></th>
					<th class="g"><?php echo(html_tile("c12")) ;?></th>
					<th class="g"><?php echo(html_tile("c13")) ;?></th>
					<th class="g"><?php echo(html_tile("c14")) ;?></th>
				</tr>
				<tr>
					<th class="g"><?php echo(html_tile("c21")) ;?></th>
					<th class="g"><?php echo(html_tile("c22")) ;?></th>
					<th class="g"><?php echo(html_tile("c23")) ;?></th>
					<th class="g"><?php echo(html_tile("c24")) ;?></th>
				</tr>
				<tr>
					<th class="g"><?php echo(html_tile("c31")) ;?></th>
					<th class="g"><?php echo(html_tile("c32")) ;?></th>
					<th class="g"><?php echo(html_tile("c33")) ;?></th>
					<th class="g"><?php echo(html_tile("c34")) ;?></th>
				</tr>
				<tr>
					<th class="g"><?php echo(html_tile("c41")) ;?></th>
					<th class="g"><?php echo(html_tile("c42")) ;?></th>
					<th class="g"><?php echo(html_tile("c43")) ;?></th>
					<th class="g"><?php echo(html_tile("c44")) ;?></th>
				</tr>
			</table>
		</div>
        <?php
			//Displays an article if you have a 2048 or higher tile on the grid.
			if(haswon()){
			?>
            <article class="hbox">
				<header>
					<h1>
						Because you won
					</h1>
				</header>
				<div class="article_body">
					<p>
						Hum... It seems like you indeed won the game.
						<br/><br/>
						Congratulations!
						<br/>
						I was not expecting this... But maybe you are better than expected!
						But you achieved nothing. Do you feel happy about it? You shouldn't.
						You lost your time here... But are you going to continue wasting it?
						<br/>
						Maybe... 
						<br/><br/>
						By the way, did you find the easter egg? I think it's worth it!
						<br/><br/>
						Thanks for playing anyways!
						<br/><br/>
						More of my games here : [I'm a lazy developper.]
					</p>
				</div>
				<div class="hidden"><br/></div>
			</article>
			<?php
			}
            ?>
    </body>
</html>

<!-- // http://localhost:4000
// <div class = "popup" id="popupGameOver">
//             <h2>Game over!</h2>
//             <p>Your score :</p>
//             <span id="scorePopup"></span>
//             <button type = "button" onclick="tryAgain('popupGameOver')">Try again</button>
//         </div>
//         <div class = "popup" id="popupWon">
//             <h2>You won!</h2>
//             <div><button type = "button" onclick="tryAgain('popupWon')">Restart</button></div>
//             <div><button type = "button" onclick="continuePlaying()">Continue playing</button></div>
//         </div> -->