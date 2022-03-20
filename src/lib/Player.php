<?php

require_once('User.php');

class Player implements User
{
    private array $cardRanks = [];

    public function drawCard()
    {
        return 'h2';
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
