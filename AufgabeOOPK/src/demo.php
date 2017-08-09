<?php

include 'autoload.php';

$factory = new Factory();

$conf = $factory->createConfiguration('conf.ini');

$game = $factory->createGame($conf->getPlayers(), $conf->getColors());
$game->prepare($factory->createDiceArray($conf->getColors()));
$game->play();

