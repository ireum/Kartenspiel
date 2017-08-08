<?php

include 'autoload.php';

$player1 = new Player('Alice');
$player2 = new Player('Bob');
$player3 = new Player('Carol');
$playerArray = [$player1, $player2, $player3];

$game = new Game($playerArray);
$game->prepare();
$game->play();
