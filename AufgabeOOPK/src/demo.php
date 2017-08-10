<?php

include 'autoload.php';

$factory = new Factory();

try {
    $conf = $factory->createConfiguration('conf.ini');
} catch (Exception $e) {
    echo strtoupper($e->getMessage());
    exit();
}
$game = $factory->createGame($conf->getPlayers(), $conf->getColors(), $conf);
$game->prepare($factory->createDiceArray($conf->getColors()));
$game->play();

