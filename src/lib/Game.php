<?php

class Game
{
    public function gameStart()
    {
        $card = new Card();

        $player = new Player();
        $playerCards = [];
        $playerCards[] = $player->drawCard();
        $playerStringCards = $player->changeToStrings($playerCards);

        $dealer = new Dealer();
        $dealerCards = [];
        $dealerCards[] = $dealer->drawCard();
        $dealerStringCards = $dealer->changeToStrings($dealerCards);

        $playerCardRanks = $player->getCardRanks();
        $playerSum = array_sum($playerCardRanks);

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
