<?php

include 'autoload.php';

$red = new Color('red');
$green = new Color('green');
$blue = new Color('blue');
$pink = new Color('pink');
$orange = new Color('orange');
$yellow = new Color('yellow');
$diceArray = [$red, $green, $blue, $pink, $orange, $yellow];

$player1 = new Player('Alice');
$player2 = new Player('Bob');
$player3 = new Player('Carol');
$playerArray = [$player1, $player2, $player3];


$game = new Game($playerArray, $diceArray, new EchoLogger());
$game->prepare(5);
$game->play();

