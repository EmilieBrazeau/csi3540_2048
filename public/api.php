<?php
require_once('_config.php');

$path = $_GET["action"] ?: "/2048/404";

switch ($path) {
case "/2048/new":
  $game = new Game2048();
  $json = $game->toEncodedJson();
  break;

default:
  $json = json_encode(["error" => "Unknown path {$path}"]);
}

header("Content-Type: application/json");
echo $json;
