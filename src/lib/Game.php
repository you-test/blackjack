<?php

require_once('Player.php');
require_once('Dealer.php');

class Game
{
    private const FIRST_DRAW_CARDS_NUM = 2;

    private array $playerCards = [];

    public function gameStart()
    {
        // プレイヤーが最初に2枚引
        $player = new Player();
        for ($i = 0; $i < self::FIRST_DRAW_CARDS_NUM; $i++) {

            do {
                $card = $player->drawCard();
                $this->playerCards[] = $card;
            } while (isCard($card))

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

    private function isCard(obj $card): bool
    {
        return in_array($card->getCardString(), $this->$playerCards[0]);
    }
}
