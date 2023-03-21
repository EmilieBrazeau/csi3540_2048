<?php
class Game2048{

    public $score = 0;
    public $grid;
    public $columns = 4;
    public $rows = 4;
    public $won = false;

    public function __construct(){
        $this->resetGame();
    }

    public function resetGame(){
        $this->grid = [
            [0,0,0,0],
            [0,0,0,0],
            [0,0,0,0],
            [0,0,0,0]
        ];
        $this->score = $this->calculateScore($this->grid); 
    }

    function html_tile($tileid){
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

    function filterZeros($row) {
        return array_filter($row, function($value) {
          return $value !== 0;
        });
    }

    function slide($row){
        $row = filterZeros($row);

        for($i = 0; $i < count($row)-1; $i++){
            if($row[$i] == $row[$i+1]){
                $row[$i] *= 2;
                $row[$i+1] = 0;
                $score += $row[$i];
                if($row[$i] == 2048 && !$won){
                    $won = true;
                    //gameWon();
                }
            }
        }
        
        $row = filterZeros($row);
        
        while(count($row) < $columns){
            array_push($row,0);
        }
        
        return $row;
    }

    function slideLeft(){
        for($r = 0; $r < $rows; $r++){
            $row = $grid[$r];
            $row = slide($row);
            $grid[$r] = $row;
    
            //for ($c = 0; $c < $columns; $c++){
                //$tile = document.getElementById($r.toString()+","+$c.toString());
                //$number = $grid[$r][$c];
                //updateTile(tile,number);
            //}
        }
    }
    
    function slideRight(){
        for($r = 0; $r < $rows; $r++){
            $row = $grid[$r];
            $row = array_reverse($row);
            $row = slide($row);
            $row = array_reverse($row);
            $grid[$r] = $row;
    
            // for ($c = 0; $c < $columns; $c++){
            //     $tile = document.getElementById(r.toString()+","+c.toString());
            //     $number = $grid[$r][$c];
            //     updateTile(tile,number);
            // }
        }
    }
    
    function slideUp(){
        for ($c = 0; $c < $columns; $c++){
            $row = [$grid[0][$c], $grid[1][$c], $grid[2][$c], $grid[3][$c]];
            $row = slide($row);
    
            // for ($r = 0; $r < $rows; $r++){
            //     $grid[$r][$c] = $row[$r];
            //     $tile = document.getElementById(r.toString()+","+c.toString());
            //     $number = $grid[$r][$c];
            //     updateTile(tile,number);
            // }
        }
    }
    
    function slideDown(){
        for ($c = 0; $c < $columns; $c++){
            $row = [$grid[0][$c], $grid[1][$c], $grid[2][$c], $grid[3][$c]];
            $row = array_reverse($row);
            $row = slide($row);
            $row = array_reverse($row);
            
            // for ($r = 0; $r < $rows; $r++){
            //     $grid[$r][$c] = $row[$r];
            //     $tile = document.getElementById(r.toString()+","+c.toString());
            //     $number = $grid[$r][$c];
            //     updateTile(tile,number);
            // }
        }
    }

    function isFull(){
        for($r = 0; $r < $rows; $r++){
            for($c = 0; $c < $columns; $c++){
                if ($_GET["c".$for_1.$for_2] == 0){
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
                    $newtilevalue = 2;
                }
                else{
                    $newtilevalue = 4;
                }
                $addedNewTile = true;
                $returnurl = gentileget($newtilevalue,$r,$c,11)."&".gentileget($newtilevalue,$r,$c,12)."&".gentileget($newtilevalue,$r,$c,13)."&".gentileget($newtilevalue,$r,$c,14)."&" ;
                $returnurl = $returnurl.gentileget($newtilevalue,$r,$c,21)."&".gentileget($newtilevalue,$r,$c,22)."&".gentileget($newtilevalue,$r,$c,23)."&".gentileget($newtilevalue,$r,$c,24)."&" ;
                $returnurl = $returnurl.gentileget($newtilevalue,$r,$c,31)."&".gentileget($newtilevalue,$r,$c,32)."&".gentileget($newtilevalue,$r,$c,33)."&".gentileget($newtilevalue,$r,$c,34)."&" ;
                $returnurl = $returnurl.gentileget($newtilevalue,$r,$c,41)."&".gentileget($newtilevalue,$r,$c,42)."&".gentileget($newtilevalue,$r,$c,43)."&".gentileget($newtilevalue,$r,$c,44) ;
                return $returnurl ;
            }
        }
        return (gettiles());
    }

    function gettiles(){
        $string = "c11=".$_GET["c11"]."&c12=".$_GET["c12"]."&c13=".$_GET["c13"]."&c14=".$_GET["c14"]."&c21=".$_GET["c21"]."&c22=".$_GET["c22"]."&c23=".$_GET["c23"]."&c24=".$_GET["c24"]."&c31=".$_GET["c31"]."&c32=".$_GET["c32"]."&c33=".$_GET["c33"]."&c34=".$_GET["c34"]."&c41=".$_GET["c41"]."&c42=".$_GET["c42"]."&c43=".$_GET["c43"]."&c44=".$_GET["c44"]."" ;
        return $string;
    }

    function gentileget ($tv,$sx,$sy,$tile_sid) {
        if("c".$sx.$sy == "c".$tile_sid){
                    return "c".$tile_sid."=".$tv ;
                } else {
                    return "c".$tile_sid."=".$_GET["c".$tile_sid] ;
                }
    }

    function canplay(){
        for($for_1=1;$for_1<=4;$for_1++){
            for($for_2=1;$for_2<=4;$for_2++){
                if ($_GET["c".$for_1.$for_2] == 0){
                    return true;
                }
            }
        }
        for($for_1=1;$for_1<=4;$for_1++){
            for($for_2=1;$for_2<=3;$for_2++){
                if($_GET["c".$for_1.$for_2] == $_GET["c".$for_1.($for_2 + 1)]){
                    return true ;
                }
            }
        }
        for($for_1=1;$for_1<=3;$for_1++){
            for($for_2=1;$for_2<=4;$for_2++){
                if($_GET["c".$for_1.$for_2] == $_GET["c".($for_1 + 1).$for_2]){
                    return true ;
                }
            }
        }
        return false;
    }

    function randomStart(){
        $grid = array();
        for ($r = 0; $r < $rows; $r++) {
            $row = array();
            for ($c = 0; $c < $columns; $c++) {
                $row[] = 0;
            }
        $grid[] = $row;
        }
        $grid = addNewTile();
        $grid = addNewTile();
    }

    function haswon(){
        for($for_1=1;$for_1<=4;$for_1++){
            for($for_2=1;$for_2<=4;$for_2++){
                if ($_GET["c".$for_1.$for_2] >= 2048 ){
                    return true;
                }
            }
        }
        return false;
    }

    function getmovedscore( $direction ){ // #TODO
        if($direction == 1){
            slideUp();
        }
        if($direction == 2){
            slideRight();
        }
        if($direction == 3){
            slideDown();
        }
        if($direction == 4){
            slideLeft();
        }
        return $_GET["score"] + $score;
    }

    public function calculateScore($grid) {
        return 99;
    }

    public function toJson(){
        return["grid" => $this->grid, "score" => $this->score];
    }

    public function toEncodedJson(){
        return json_encode();
    }
}?>
<?php
if(!isset($_GET["score"])){
    header(randomStart());
    exit();
}

if(isset($_GET["move"])){
	header("Location:2048Game.php?score=".$_GET["score"]."&".addNewTile()) ;
	exit();
}
?>
