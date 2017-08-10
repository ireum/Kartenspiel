<?php

include 'autoload.php';

$configuration = new Configuration('conf.ini');
$factory = new Factory($configuration);

$game = $factory->createGame();
$game->prepare($factory->createDiceArray($configuration->getColors()));
$game->play();

