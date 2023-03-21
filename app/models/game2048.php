<?php /*-----Functions-----*/
function htmlTile($tileid){
	$string = "";
	$tilevalue = $_GET[$tileid];
	if($tilevalue==0){
		return $string;
	}else{
		if($tilevalue <= 2048){
			$string = '<div class="tile_'.$tilevalue.'">'.$tilevalue.'</div>';
			return $string;
		}
		else{
			$string = '<div class="tile_max">'.$tilevalue.'</div>';
			return $string;
		}
	}
}

function htmlScore($tileid){
	if(!isset($_GET[$tileid])){
		return '<div class="points">0</div>';
	}
	$tilevalue = $_GET[$tileid];
	return '<div class="points">'.$tilevalue.'</div>';
}

function getTiles(){
	$string = "c11=".$_GET["c11"]."&c12=".$_GET["c12"]."&c13=".$_GET["c13"]."&c14=".$_GET["c14"]."&c21=".$_GET["c21"]."&c22=".$_GET["c22"]."&c23=".$_GET["c23"]."&c24=".$_GET["c24"]."&c31=".$_GET["c31"]."&c32=".$_GET["c32"]."&c33=".$_GET["c33"]."&c34=".$_GET["c34"]."&c41=".$_GET["c41"]."&c42=".$_GET["c42"]."&c43=".$_GET["c43"]."&c44=".$_GET["c44"]."" ;
	return $string;
}

function filterZeros($row) {
	return array_filter($row, function($value) {
	  return $value !== 0;
	});
}

function slideLine($v1,$v2,$v3,$v4){
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}
	//Merge 3 and 4
	if( $v4 == $v3 ){
		$v4 = $v4 * 2 ;
		$v3 = 0 ;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}
	//Merge 2 and 3
	if( $v3 == $v2 ){
		$v3 = $v3 * 2 ;
		$v2 = 0 ;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}
	//Merge 1 and 2
	if( $v2 == $v1 ){
		$v2 = $v2 * 2 ;
		$v1 = 0 ;
	}
	$ret = [ 1 => $v1 , 2 => $v2 , 3 => $v3 , 4 => $v4 ];
	return $ret ;
}


//1 up - 2 right - 3 down - 4 left
function getMovedResult($direction){
	$result = "";
	if($direction == 1){
		$a1 = slideLine($_GET["c41"],$_GET["c31"],$_GET["c21"],$_GET["c11"]) ;
		$a2 = slideLine($_GET["c42"],$_GET["c32"],$_GET["c22"],$_GET["c12"]) ;
		$a3 = slideLine($_GET["c43"],$_GET["c33"],$_GET["c23"],$_GET["c13"]) ;
		$a4 = slideLine($_GET["c44"],$_GET["c34"],$_GET["c24"],$_GET["c14"]) ;
		$result = "c11=".$a1[4]."&c12=".$a2[4]."&c13=".$a3[4]."&c14=".$a4[4]."&c21=".$a1[3]."&c22=".$a2[3]."&c23=".$a3[3]."&c24=".$a4[3]."&c31=".$a1[2]."&c32=".$a2[2]."&c33=".$a3[2]."&c34=".$a4[2]."&c41=".$a1[1]."&c42=".$a2[1]."&c43=".$a3[1]."&c44=".$a4[1] ;
		return $result ;
	}
	if($direction == 2){
		$a1 = slideLine($_GET["c11"],$_GET["c12"],$_GET["c13"],$_GET["c14"]) ;
		$a2 = slideLine($_GET["c21"],$_GET["c22"],$_GET["c23"],$_GET["c24"]) ;
		$a3 = slideLine($_GET["c31"],$_GET["c32"],$_GET["c33"],$_GET["c34"]) ;
		$a4 = slideLine($_GET["c41"],$_GET["c42"],$_GET["c43"],$_GET["c44"]) ;
		$result = "c11=".$a1[1]."&c12=".$a1[2]."&c13=".$a1[3]."&c14=".$a1[4]."&c21=".$a2[1]."&c22=".$a2[2]."&c23=".$a2[3]."&c24=".$a2[4]."&c31=".$a3[1]."&c32=".$a3[2]."&c33=".$a3[3]."&c34=".$a3[4]."&c41=".$a4[1]."&c42=".$a4[2]."&c43=".$a4[3]."&c44=".$a4[4] ;
		return $result ;
	}
	if($direction == 3){
		$a1 = slideLine($_GET["c11"],$_GET["c21"],$_GET["c31"],$_GET["c41"]) ;
		$a2 = slideLine($_GET["c12"],$_GET["c22"],$_GET["c32"],$_GET["c42"]) ;
		$a3 = slideLine($_GET["c13"],$_GET["c23"],$_GET["c33"],$_GET["c43"]) ;
		$a4 = slideLine($_GET["c14"],$_GET["c24"],$_GET["c34"],$_GET["c44"]) ;
		$result = "c11=".$a1[1]."&c12=".$a2[1]."&c13=".$a3[1]."&c14=".$a4[1]."&c21=".$a1[2]."&c22=".$a2[2]."&c23=".$a3[2]."&c24=".$a4[2]."&c31=".$a1[3]."&c32=".$a2[3]."&c33=".$a3[3]."&c34=".$a4[3]."&c41=".$a1[4]."&c42=".$a2[4]."&c43=".$a3[4]."&c44=".$a4[4] ;
		return $result ;
	}
	if($direction == 4){
		$a1 = slideLine($_GET["c14"],$_GET["c13"],$_GET["c12"],$_GET["c11"]) ;
		$a2 = slideLine($_GET["c24"],$_GET["c23"],$_GET["c22"],$_GET["c21"]) ;
		$a3 = slideLine($_GET["c34"],$_GET["c33"],$_GET["c32"],$_GET["c31"]) ;
		$a4 = slideLine($_GET["c44"],$_GET["c43"],$_GET["c42"],$_GET["c41"]) ;
		$result = "c11=".$a1[4]."&c12=".$a1[3]."&c13=".$a1[2]."&c14=".$a1[1]."&c21=".$a2[4]."&c22=".$a2[3]."&c23=".$a2[2]."&c24=".$a2[1]."&c31=".$a3[4]."&c32=".$a3[3]."&c33=".$a3[2]."&c34=".$a3[1]."&c41=".$a4[4]."&c42=".$a4[3]."&c43=".$a4[2]."&c44=".$a4[1] ;
		return $result ;
	}
	return $result;
}

function isFull(){
	for($r = 1; $r <= 4; $r++){
		for($c = 1; $c <= 4; $c++){
			if ($_GET["c".$r.$c] == 0){
				return false;
			}
		}
	}
	return true;
}

function addNewTile(){
	if(isFull()){
		return;
	}

	$addedNewTile = false;
	while(!$addedNewTile){
		$r = rand(1,4) ;
		$c = rand(1,4) ;
		if ($_GET["c".$r.$c] == 0) {
			$probability = rand(1,10);
			if($probability == 1){
				$newtilevalue = 4;
			}
			else{
				$newtilevalue = 2;
			}
			$addedNewTile = true;
			$returnurl = getSingleTile($newtilevalue,$r,$c,11)."&".getSingleTile($newtilevalue,$r,$c,12)."&".getSingleTile($newtilevalue,$r,$c,13)."&".getSingleTile($newtilevalue,$r,$c,14)."&" ;
			$returnurl = $returnurl.getSingleTile($newtilevalue,$r,$c,21)."&".getSingleTile($newtilevalue,$r,$c,22)."&".getSingleTile($newtilevalue,$r,$c,23)."&".getSingleTile($newtilevalue,$r,$c,24)."&" ;
			$returnurl = $returnurl.getSingleTile($newtilevalue,$r,$c,31)."&".getSingleTile($newtilevalue,$r,$c,32)."&".getSingleTile($newtilevalue,$r,$c,33)."&".getSingleTile($newtilevalue,$r,$c,34)."&" ;
			$returnurl = $returnurl.getSingleTile($newtilevalue,$r,$c,41)."&".getSingleTile($newtilevalue,$r,$c,42)."&".getSingleTile($newtilevalue,$r,$c,43)."&".getSingleTile($newtilevalue,$r,$c,44) ;
			return $returnurl;
		}
	}
	return (getTiles());
}



function getSingleTile ($tv,$sx,$sy,$tile_sid) {
	if("c".$sx.$sy == "c".$tile_sid){
				return "c".$tile_sid."=".$tv ;
			} else {
				return "c".$tile_sid."=".$_GET["c".$tile_sid] ;
			}
}

function randomStart($indice){
	$randompos1 = rand(0,15);
	$randompos2 = rand(0,15);
	$pos = 0;
	while($randompos1 == $randompos2){
		$randompos2 = rand(0,15);
	}
	if($indice == 0){
		$initialGrid = "Location:game2048.php?score=0&s1=0&s2=0&s3=0&s4=0&s5=0&s6=0&s7=0&s8=0&s9=0&s10=0&c";
	}
	else{
		$initialGrid = "c";
	}
	for($for_1=1;$for_1<=4;$for_1++){
		for($for_2=1;$for_2<=4;$for_2++){
			if($pos == $randompos1 || $pos == $randompos2){
				$initialGrid = $initialGrid.$for_1.$for_2."=2&c";
			}
			else{
				$initialGrid = $initialGrid.$for_1.$for_2."=0&c";
			}
			if($pos == 15){
				$finalGrid = substr($initialGrid, 0, -2);
			}
			$pos++;
		}
	}
	return $finalGrid;
}

function haswon(){
	for($for_1=1;$for_1<=4;$for_1++){
		for($for_2=1;$for_2<=4;$for_2++){
			if ($_GET["c".$for_1.$for_2] == 2048){
				return true;
			}
		}
	}
	return false;
}

function hasLost(){
	if(!isFull()){
		return false;
	}
	for($for_1=1;$for_1<=4;$for_1++){
		for($for_2=1;$for_2<4;$for_2++){
			if ($_GET["c".$for_1.$for_2] == $_GET["c".$for_1.($for_2+1)] || $_GET["c".$for_2.$for_1] == $_GET["c".($for_2+1).$for_1]){
				return false;
			}
		}
	}
	return true;
}

function getMovedScore( $direction ){
	$a1 = 0;
	$a2 = 0;
	$a3 = 0;
	$a4 = 0;
	if($direction == 1){$a1 = 0;
		$a1 += lineScore(array($_GET["c41"],$_GET["c31"],$_GET["c21"],$_GET["c11"]));
		$a2 += lineScore(array($_GET["c42"],$_GET["c32"],$_GET["c22"],$_GET["c12"]));
		$a3 += lineScore(array($_GET["c43"],$_GET["c33"],$_GET["c23"],$_GET["c13"]));
		$a4 += lineScore(array($_GET["c44"],$_GET["c34"],$_GET["c24"],$_GET["c14"]));
		return (string)($_GET["score"] + $a1 + $a2 + $a3 + $a4) ;
	}
	if($direction == 2){
		$a1 += lineScore(array($_GET["c11"],$_GET["c12"],$_GET["c13"],$_GET["c14"]));
		$a2 += lineScore(array($_GET["c21"],$_GET["c22"],$_GET["c23"],$_GET["c24"]));
		$a3 += lineScore(array($_GET["c31"],$_GET["c32"],$_GET["c33"],$_GET["c34"]));
		$a4 += lineScore(array($_GET["c41"],$_GET["c42"],$_GET["c43"],$_GET["c44"]));
		return (string)($_GET["score"] + $a1 + $a2 + $a3 + $a4) ;
	}
	if($direction == 3){
		$a1 += lineScore(array($_GET["c11"],$_GET["c21"],$_GET["c31"],$_GET["c41"]));
		$a2 += lineScore(array($_GET["c12"],$_GET["c22"],$_GET["c32"],$_GET["c42"]));
		$a3 += lineScore(array($_GET["c13"],$_GET["c23"],$_GET["c33"],$_GET["c43"]));
		$a4 += lineScore(array($_GET["c14"],$_GET["c24"],$_GET["c34"],$_GET["c44"]));
		return (string)($_GET["score"] + $a1 + $a2 + $a3 + $a4) ;
	}
	if($direction == 4){
		$a1 = lineScore(array($_GET["c14"],$_GET["c13"],$_GET["c12"],$_GET["c11"]));
		$a2 = lineScore(array($_GET["c24"],$_GET["c23"],$_GET["c22"],$_GET["c21"]));
		$a3 = lineScore(array($_GET["c34"],$_GET["c33"],$_GET["c32"],$_GET["c31"]));
		$a4 = lineScore(array($_GET["c44"],$_GET["c43"],$_GET["c42"],$_GET["c41"]));
		return (string)($_GET["score"] + $a1 + $a2 + $a3 + $a4) ;
	}
	return 0;
}


function lineScore($row){
		$row = filterZeros($row);
		$newlinescore = 0;
		for($i = 0; $i < count($row)-1; $i++){
			if($row[$i] == $row[$i+1]){
				$row[$i] *= 2;
				$row[$i+1] = 0;
				$newlinescore += $row[$i];
			}
		}
	return $newlinescore ;
}

function tryAgain(){
	$s1 = ($_GET["s1"]);
	$s2 = ($_GET["s2"]);
	$s3 = ($_GET["s3"]);
	$s4 = ($_GET["s4"]);
	$s5 = ($_GET["s5"]);
	$s6 = ($_GET["s6"]);
	$s7 = ($_GET["s7"]);
	$s8 = ($_GET["s8"]);
	$s9 = ($_GET["s9"]);
	$s10 = ($_GET["s10"]);
	$score = ($_GET["score"]);
	if($score > $s10){
		$s10 = $score;
		if($s10 > $s9){
			$s10 = $s9;
			$s9 = $score;
			if($s9 > $s8){
				$s9 = $s8;
				$s8 = $score;
				if($s8 > $s7){
					$s8 = $s7;
					$s7 = $score;
					if($s7 > $s6){
						$s7 = $s6;
						$s6 = $score;
					}if($s6 > $s5){
						$s6 = $s5;
						$s5 = $score;
						if($s5 > $s4){
							$s5 = $s4;
							$s4 = $score;
						}if($s4 > $s3){
							$s4 = $s3;
							$s3 = $score;
							if($s3 > $s2){
								$s3 = $s2;
								$s2 = $score;
								if($s2 > $s1){
									$s2 = $s1;
									$s1 = $score;
								}
							}
						}
					}
				}
			}
		}
	}
	return [1 => $s1, 2 => $s2, 3 => $s3, 4 => $s4, 5 => $s5, 6 => $s6, 7 => $s7, 8 => $s8, 9 => $s9, 10 => $s10];
}

/*-----End of functions-----*/
?>
<?php

if(!isset($_GET["score"])){
	header(randomStart(0));
	exit();
}

if(isset($_GET["move"])){
	header("Location:game2048.php?score=".$_GET["score"]."&s1=".$_GET["s1"]."&s2=".$_GET["s2"]."&s3=".$_GET["s3"]."&s4=".$_GET["s4"]."&s5=".$_GET["s5"]."&s6=".$_GET["s6"]."&s7=".$_GET["s7"]."&s8=".$_GET["s8"]."&s9=".$_GET["s9"]."&s10=".$_GET["s10"]."&".addNewTile()) ;
	exit();
}

if(isset($_GET["won"])){
	header("Location:game2048.php?score=".$_GET["score"]."&s1=".$_GET["s1"]."&s2=".$_GET["s2"]."&s3=".$_GET["s3"]."&s4=".$_GET["s4"]."&s5=".$_GET["s5"]."&s6=".$_GET["s6"]."&s7=".$_GET["s7"]."&s8=".$_GET["s8"]."&s9=".$_GET["s9"]."&s10=".$_GET["s10"]."&".getTiles()) ;
	exit();
}

?>
<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>
			2048 in php
		</title>
		<link type="text/css" rel="stylesheet" href="styles.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="main">
			<h1>
				2048 in php
			</h1>
			<h2 class="score">
				Score : <?php echo($_GET["score"]) ; ?>
			</h2>
			<a href="game2048.php" style="color:#ffacbb">Click here for new game </br> (warning: it will clear the scoreboard)</a>
		</div>
		<span id = "backdrop">
			<span class="grid">
				<table>
					<tr>
						<th class="g"><?php echo(htmlTile("c11")) ;?></th>
						<th class="g"><?php echo(htmlTile("c12")) ;?></th>
						<th class="g"><?php echo(htmlTile("c13")) ;?></th>
						<th class="g"><?php echo(htmlTile("c14")) ;?></th>
					</tr>
					<tr>
						<th class="g"><?php echo(htmlTile("c21")) ;?></th>
						<th class="g"><?php echo(htmlTile("c22")) ;?></th>
						<th class="g"><?php echo(htmlTile("c23")) ;?></th>
						<th class="g"><?php echo(htmlTile("c24")) ;?></th>
					</tr>
					<tr>
						<th class="g"><?php echo(htmlTile("c31")) ;?></th>
						<th class="g"><?php echo(htmlTile("c32")) ;?></th>
						<th class="g"><?php echo(htmlTile("c33")) ;?></th>
						<th class="g"><?php echo(htmlTile("c34")) ;?></th>
					</tr>
					<tr>
						<th class="g"><?php echo(htmlTile("c41")) ;?></th>
						<th class="g"><?php echo(htmlTile("c42")) ;?></th>
						<th class="g"><?php echo(htmlTile("c43")) ;?></th>
						<th class="g"><?php echo(htmlTile("c44")) ;?></th>
					</tr>
				</table>
			</span>
			<span class="sub lboard_section">
				<h1>How to play</h1>
				<br/>
				<h2 style="color: black">Join numbers to get to the 2048 tile!</h2>
				<p style="color: black">Use arrow keys to move the tiles.
					<br> When two tiles having the same number touch, <br>they join into one.
				</p>
			</span>
			<span class="wrapper">
				<div class = "lboard_section">
					<h1>Scoreboard</h1>
					<div class="lboard_mem rank">
						<span style="color: black">1- </span>
						<?php echo(htmlScore("s1"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">2- </span>
						<?php echo(htmlScore("s2"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">3- </span>
						<?php echo(htmlScore("s3"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">4- </span>
						<?php echo(htmlScore("s4"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">5- </span>
						<?php echo(htmlScore("s5"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">6- </span>
						<?php echo(htmlScore("s6"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">7- </span>
						<?php echo(htmlScore("s7"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">8- </span>
						<?php echo(htmlScore("s8"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">9- </span>
						<?php echo(htmlScore("s9"));?>
					</div>
					<div class="lboard_mem rank">
						<span style="color: black">10- </span>
						<?php echo(htmlScore("s10"));?>
					</div>
				</div>
			</span>

			<script>
				document.addEventListener('keyup', function(event) {
				if (event.code == 'ArrowUp' && (<?php echo strcmp(getMovedResult(1), getTiles()) == 0 ? 'false' : 'true'; ?> || <?php echo strcmp(getMovedScore(1), $_GET["score"]) == 0 ? 'false' : 'true'; ?>)) {
					window.location.href = "<?php echo("game2048.php?score=".getMovedScore(1)."&s1=".$_GET["s1"]."&s2=".$_GET["s2"]."&s3=".$_GET["s3"]."&s4=".$_GET["s4"]."&s5=".$_GET["s5"]."&s6=".$_GET["s6"]."&s7=".$_GET["s7"]."&s8=".$_GET["s8"]."&s9=".$_GET["s9"]."&s10=".$_GET["s10"]."&move=1&".getMovedResult(1));?>";
					
				}
				if (event.code == 'ArrowLeft' && (<?php echo strcmp(getMovedResult(4), getTiles()) == 0 ? 'false' : 'true'; ?> || <?php echo strcmp(getMovedScore(4), $_GET["score"]) == 0 ? 'false' : 'true'; ?>)) {
					window.location.href = "<?php echo("game2048.php?score=".getMovedScore(4)."&s1=".$_GET["s1"]."&s2=".$_GET["s2"]."&s3=".$_GET["s3"]."&s4=".$_GET["s4"]."&s5=".$_GET["s5"]."&s6=".$_GET["s6"]."&s7=".$_GET["s7"]."&s8=".$_GET["s8"]."&s9=".$_GET["s9"]."&s10=".$_GET["s10"]."&move=1&".getMovedResult(4));?>";
					
				}
				if (event.code == 'ArrowRight' && (<?php echo strcmp(getMovedResult(2), getTiles()) == 0 ? 'false' : 'true'; ?> || <?php echo strcmp(getMovedScore(2), $_GET["score"]) == 0 ? 'false' : 'true'; ?>)) {
					window.location.href = "<?php echo("game2048.php?score=".getMovedScore(2)."&s1=".$_GET["s1"]."&s2=".$_GET["s2"]."&s3=".$_GET["s3"]."&s4=".$_GET["s4"]."&s5=".$_GET["s5"]."&s6=".$_GET["s6"]."&s7=".$_GET["s7"]."&s8=".$_GET["s8"]."&s9=".$_GET["s9"]."&s10=".$_GET["s10"]."&move=1&".getMovedResult(2));?>";
					
				}
				if (event.code == 'ArrowDown' && (<?php echo strcmp(getMovedResult(3), getTiles()) == 0 ? 'false' : 'true'; ?> || <?php echo strcmp(getMovedScore(3), $_GET["score"]) == 0 ? 'false' : 'true'; ?>)) {
					window.location.href = "<?php echo("game2048.php?score=".getMovedScore(3)."&s1=".$_GET["s1"]."&s2=".$_GET["s2"]."&s3=".$_GET["s3"]."&s4=".$_GET["s4"]."&s5=".$_GET["s5"]."&s6=".$_GET["s6"]."&s7=".$_GET["s7"]."&s8=".$_GET["s8"]."&s9=".$_GET["s9"]."&s10=".$_GET["s10"]."&move=1&".getMovedResult(3));?>";
				}
				});
			</script>
		</span>
					
		<?php
		if(hasLost()){
		?>
		<div class = "popup open-popup" id="popupWon">
			<h2>You lost!</h2>
			<h3>Your score :</h3>
			<?php echo($_GET["score"]) ;?>
			<div><button id = "restart" type = "button">Restart</button></div>
		</div>
		<script>
				let backdrop = document.getElementById("backdrop");
				let popUpWon = document.getElementById("popupWon");
				backdrop.classList.add('blur');

				let button = document.getElementById("restart");

				button.addEventListener('click',function(){
					console.log("hello from get over");
					
					window.location.href = "<?php echo("game2048.php?score=0&s1=".tryAgain()[1]."&s2=".tryAgain()[2]."&s3=".tryAgain()[3]."&s4=".tryAgain()[4]."&s5=".tryAgain()[5]."&s6=".tryAgain()[6]."&s7=".tryAgain()[7]."&s8=".tryAgain()[8]."&s9=".tryAgain()[9]."&s10=".tryAgain()[10]."&".randomStart(1));?>";
				});

				
		</script>
		<?php
		}
		?>
	</body>
</html>

<!-- //Functions I modified and didn't use

// function slide($row){
// 	$row = filterZeros($row);

// 	for($i = 0; $i < count($row)-1; $i++){
// 		if($row[$i] == $row[$i+1]){
// 			$row[$i] *= 2;
// 			$row[$i+1] = 0;
// 		}
// 	}
	
// 	$row = filterZeros($row);
	
// 	while(count($row) < 4){
// 		array_push($row,0);
// 	}
// 	return $row;
// }

// function slideLeftOrUp($r1,$r2,$r3,$r4){
// 	$row = [$r1,$r2,$r3,$r4];
// 	$newrow = slide($row);
// 	//print("Hello");
// 	return [1 => $newrow[0], 2 => $newrow[1], 3 => $newrow[2], 4 => $newrow[3]] ;
// }

// function slideRightorDown($r1,$r2,$r3,$r4){
// 	$row = [$r1,$r2,$r3,$r4];
// 	$row = array_reverse($row);
// 	$row = slide($row);
// 	$row = array_reverse($row);
// 	return [1 => $row[0], 2 => $row[1], 3 => $row[2], 4 => $row[3]] ;
// }

/* getMovedResult : Return the GET values using the existing ones moved to a set direction.
1 up - 2 right - 3 down - 4 left
This doesn't generate any new tiles.
Keep in mind that doesn't increases the score.
(int) -> (String) */
// function getMovedResult($direction){
// 	$result = "";
// 	if($direction == 1){
// 		$a1 = slideLeftOrUp($_GET["c41"],$_GET["c31"],$_GET["c21"],$_GET["c11"]) ;
// 		$a2 = slideLeftOrUp($_GET["c42"],$_GET["c32"],$_GET["c22"],$_GET["c12"]) ;
// 		$a3 = slideLeftOrUp($_GET["c43"],$_GET["c33"],$_GET["c23"],$_GET["c13"]) ;
// 		$a4 = slideLeftOrUp($_GET["c44"],$_GET["c34"],$_GET["c24"],$_GET["c14"]) ;
// 		$result = "c11=".$a1[4]."&c12=".$a2[4]."&c13=".$a3[4]."&c14=".$a4[4]."&c21=".$a1[3]."&c22=".$a2[3]."&c23=".$a3[3]."&c24=".$a4[3]."&c31=".$a1[2]."&c32=".$a2[2]."&c33=".$a3[2]."&c34=".$a4[2]."&c41=".$a1[1]."&c42=".$a2[1]."&c43=".$a3[1]."&c44=".$a4[1] ;
// 		return $result ;
// 	}
// 	if($direction == 2){
// 		$a1 = slideRightorDown($_GET["c11"],$_GET["c12"],$_GET["c13"],$_GET["c14"]) ;
// 		$a2 = slideRightorDown($_GET["c21"],$_GET["c22"],$_GET["c23"],$_GET["c24"]) ;
// 		$a3 = slideRightorDown($_GET["c31"],$_GET["c32"],$_GET["c33"],$_GET["c34"]) ;
// 		$a4 = slideRightorDown($_GET["c41"],$_GET["c42"],$_GET["c43"],$_GET["c44"]) ;
// 		$result = "c11=".$a1[1]."&c12=".$a1[2]."&c13=".$a1[3]."&c14=".$a1[4]."&c21=".$a2[1]."&c22=".$a2[2]."&c23=".$a2[3]."&c24=".$a2[4]."&c31=".$a3[1]."&c32=".$a3[2]."&c33=".$a3[3]."&c34=".$a3[4]."&c41=".$a4[1]."&c42=".$a4[2]."&c43=".$a4[3]."&c44=".$a4[4] ;
// 		return $result ;
// 	}
// 	if($direction == 3){
// 		$a1 = slideRightorDown($_GET["c11"],$_GET["c21"],$_GET["c31"],$_GET["c41"]) ;
// 		$a2 = slideRightorDown($_GET["c12"],$_GET["c22"],$_GET["c32"],$_GET["c42"]) ;
// 		$a3 = slideRightorDown($_GET["c13"],$_GET["c23"],$_GET["c33"],$_GET["c43"]) ;
// 		$a4 = slideRightorDown($_GET["c14"],$_GET["c24"],$_GET["c34"],$_GET["c44"]) ;
// 		$result = "c11=".$a1[1]."&c12=".$a2[1]."&c13=".$a3[1]."&c14=".$a4[1]."&c21=".$a1[2]."&c22=".$a2[2]."&c23=".$a3[2]."&c24=".$a4[2]."&c31=".$a1[3]."&c32=".$a2[3]."&c33=".$a3[3]."&c34=".$a4[3]."&c41=".$a1[4]."&c42=".$a2[4]."&c43=".$a3[4]."&c44=".$a4[4] ;
// 		return $result ;
// 	}
// 	if($direction == 4){
// 		$a1 = slideLeftOrUp($_GET["c14"],$_GET["c13"],$_GET["c12"],$_GET["c11"]) ;
// 		$a2 = slideLeftOrUp($_GET["c24"],$_GET["c23"],$_GET["c22"],$_GET["c21"]) ;
// 		$a3 = slideLeftOrUp($_GET["c34"],$_GET["c33"],$_GET["c32"],$_GET["c31"]) ;
// 		$a4 = slideLeftOrUp($_GET["c44"],$_GET["c43"],$_GET["c42"],$_GET["c41"]) ;
// 		$result = "c11=".$a1[4]."&c12=".$a1[3]."&c13=".$a1[2]."&c14=".$a1[1]."&c21=".$a2[4]."&c22=".$a2[3]."&c23=".$a2[2]."&c24=".$a2[1]."&c31=".$a3[4]."&c32=".$a3[3]."&c33=".$a3[2]."&c34=".$a3[1]."&c41=".$a4[4]."&c42=".$a4[3]."&c43=".$a4[2]."&c44=".$a4[1] ;
// 		return $result ;
// 	}
// 	return $result;
// } -->