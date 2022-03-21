<?php

require_once('User.php');
require_once('Card.php');

class Player implements User
{
    private array $cardRanks = [];

    public function drawCard()
    {
        $marks = ['h', 'c', 'd', 's'];
        $numbers = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'j', 'q', 'k', 'a'];
        $randomMark = $marks[rand(0, (count($marks) - 1))];
        $randomNumber = $numbers[rand(0, count($numbers) - 1)];
        $card = $randomMark . $randomNumber;
        return new Card($card);
    }

    public function changeToStrings(array $cards): array
    {
        $strings = array_map(function($card) {
            $cardMark = mb_substr($card, 0, 1);
            $cardMarkName = '';
            switch($cardMark) {
                case 'h':
                    $cardMarkName = 'ハート';
                    break;
                case 'c':
                    $cardMarkName = 'クラブ';
                    break;
                case 'd':
                    $cardMarkName = 'ダイヤ';
                    break;
                case 's':
                    $cardMarkName = 'スペード';
                    break;
            }
            $cardNum = mb_substr($card, 1);
            return $cardMarkName . 'の' . $cardNum;
        }, $cards);

        return $strings;
    }

    public function changeToCardRanks(array $cards): array
    {
        return [2, 2];
    }

    public function setCardRanks(array $cards):void
    {
        $this->cardRanks = $cards;
    }
}
