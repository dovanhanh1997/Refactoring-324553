<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */
const ZERO_POINT = 0;
const ONE_POINT = 1;
const TWO_POINT = 2;
const THREE_POINT = 3;
const FOUR_POINT = 4;


class TennisGame
{
    public $score = '';
    public $namePlayOne;
    public $namePlayTwo;
    public $scorePlayOne;
    public $scorePlayTwo;

    public function __construct($namePlayOne, $namePlayTwo, $scorePlayOne, $scorePlayTwo)
    {
        $this->namePlayOne = $namePlayOne;
        $this->namePlayTwo = $namePlayTwo;
        $this->scorePlayOne = $scorePlayOne;
        $this->scorePlayTwo = $scorePlayTwo;
    }

    public function calculateScore()
    {

        if ($this->scorePlayOne == $this->scorePlayTwo) {
            $this->equalScore();
        } else if ($this->scorePlayOne >= FOUR_POINT || $this->scorePlayTwo >= FOUR_POINT) {
            $this->advantagePlayer();
        } else {
            $this->gameScore();
        }
    }

    public function equalScore()
    {
        switch ($this->scorePlayOne) {
            case ZERO_POINT:
                $this->score = "Love-All";
                break;
            case ONE_POINT:
                $this->score = "Fifteen-All";
                break;
            case TWO_POINT:
                $this->score = "Thirty-All";
                break;
            case THREE_POINT:
                $this->score = "Forty-All";
                break;
            default:
                $this->score = "Deuce";
                break;
        }
    }

    public function advantagePlayer()
    {
        $minusResult = $this->scorePlayOne - $this->scorePlayTwo;
        if ($minusResult == 1) $this->score = "Advantage " . $this->getNamePlayOne();
        else if ($minusResult == -1) $this->score = "Advantage " . $this->getNamePlayTwo();
        else if ($minusResult >= 2) $this->score = $this->getNamePlayOne().' '.'Win the Games';
        else $this->score = $this->getNamePlayTwo().' '.'Win the Games';
    }

    public function gameScore()
    {
        $tempScore = 0;

        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $this->scorePlayOne;
            else {
                $this->score .= "-";
                $tempScore = $this->scorePlayTwo;
            }
            switch ($tempScore) {
                case ZERO_POINT:
                    $this->score .= "Love";
                    break;
                case ONE_POINT:
                    $this->score .= "Fifteen";
                    break;
                case TWO_POINT:
                    $this->score .= "Thirty";
                    break;
                case THREE_POINT:
                    $this->score .= "Forty";
                    break;
            }
        }
    }

    public function getNamePlayOne()
    {
        return $this->namePlayOne;
    }

    public function getNamePlayTwo()
    {
        return $this->namePlayTwo;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function __toString()
    {
        return 'Result: ' . $this->getScore();
    }

}