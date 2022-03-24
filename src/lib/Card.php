<?php

class Card
{
    private const RANKS = [
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        'j' => 10,
        'q' => 10,
        'k' => 10,
        'a' => 11,
    ];

    public function __construct(private string $cardString)
    {
    }

    public function getCardString(): string
    {
        $cardMark = mb_substr($this->cardString, 0, 1);
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
        $cardNum = mb_substr($this->cardString, 1);
        return $cardMarkName . 'の' . $cardNum;
    }

    public function getCardRank(): int
    {
        $cardNum = mb_substr($this->cardString, 1);
        return self::RANKS[$cardNum];
    }
}
