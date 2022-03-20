<?php

require_once('Player.php');
require_once('Dealer.php');

class Game
{
    private const FIRST_DRAW_CARDS_NUM = 2;

    public function gameStart()
    {
        // $card = new Card();

        $player = new Player();
        $playerCards = [];
        // プレイヤーが最初に2枚引く
        for ($i = 0; $i < self::FIRST_DRAW_CARDS_NUM; $i++) {
            $playerCards[] = $player->drawCard();
        }
        $playerStringCards = $player->changeToStrings($playerCards);
        $playerCardRanks = $player->changeToCardRanks($playerCards);
        $playerSum = array_sum($playerCardRanks);

        $dealer = new Dealer();
        $dealerCards = [];
        // ディーラーが最初に２枚引く
        for ($i = 0; $i < self::FIRST_DRAW_CARDS_NUM; $i++) {
            $dealerCards[] = $dealer->drawCard();
        }
        $dealerStringCards = $dealer->changeToStrings($dealerCards);


        $firstDrawMessage = <<<FIRST
        ブラックジャックを開始します。
        あなたの引いたカードは{$playerStringCards[0]}です。
        あなたの引いたカードは{$playerStringCards[1]}です。
        ディーラーの引いたカードは{$dealerStringCards[0]}です。
        ディーラーの引いた2枚目のカードはわかりません。
        あなたの現在の得点は{$playerSum}です。カードを引きますか？（Y/N）
        FIRST;

        echo $firstDrawMessage;
    }
}
