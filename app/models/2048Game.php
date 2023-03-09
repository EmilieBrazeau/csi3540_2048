<?php
class Game2048{

    public $score;
    public $grid;
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

    

    public function calculateScore($grid) {
        return 99;
    }

    public function toJson(){
        return["grid" => $this->grid, "score" => $this->score];
    }

    public function toEncodedJson(){
        return json_encode();
    }
}
