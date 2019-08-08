<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:29 PM
 */

include ('TennisGame.php');

$tennisGame = new TennisGame('Player 1','Player 2',6,8);
$tennisGame->calculateScore();
echo $tennisGame;