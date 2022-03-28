<?php

require_once('Player.php');
require_once('Dealer.php');

class Game
{
    private const FIRST_DRAW_CARDS_NUM = 2;

    // Cardインスタンスの配列
    private array $playerCards = [];
    private array $dealerCards = [];

    public function gameStart()
    {
        // プレイヤーが最初に2枚引
        $player = new Player();
        for ($i = 0; $i < self::FIRST_DRAW_CARDS_NUM; $i++) {
                $card = $player->drawCard();
                $this->playerCards[] = $card;
        }
        $playerStringCards = $player->changeToStrings($this->playerCards);
        $playerSum = array_sum($player->getCardRanks());

        $dealer = new Dealer();
        // ディーラーが最初に２枚引く
        for ($i = 0; $i < self::FIRST_DRAW_CARDS_NUM; $i++) {
            $card = $dealer->drawCard();
            $this->dealerCards[] = $card;
        }
        $dealerStringCards = $dealer->changeToStrings($this->dealerCards);


        $firstDrawMessage = <<<FIRST
        ブラックジャックを開始します。
        あなたの引いたカードは{$playerStringCards[0]}です。
        あなたの引いたカードは{$playerStringCards[1]}です。
        ディーラーの引いたカードは{$dealerStringCards[0]}です。
        ディーラーの引いた2枚目のカードはわかりません。
        あなたの現在の得点は{$playerSum}です。カードを引きますか？（Y/N）
        FIRST;

        echo $firstDrawMessage;

        // プレイヤーがカード引くか選択（ループ）
        $response = trim(fgets(STDIN));
        echo $response . PHP_EOL;

        while ($response === 'Y' || $response === 'y') {
            $drawedCard = $player->drawCard();
            $this->playerCards[] = $drawedCard;
            $playerScore = array_sum($player->getCardRanks());

            echo "あなたの引いたカードは{$drawedCard->getCardString()}です。" . PHP_EOL;
            echo "あなたの現在の得点は{$playerScore}です。カードを引きますか？（Y/N）" . PHP_EOL;
            $response = trim(fgets(STDIN));
            echo $response;
        }

        // 最初にディーラーが引いた2枚目のカードとその合計値を表示
        $dealerFirstScore = array_sum($dealer->getCardRanks());
        $dealerCardInfoMessage = <<< INFO
        ディーラーの引いた2枚目のカードは{$dealerStringCards[1]}でした。
        ディーラーの現在の得点は{$dealerFirstScore}です。
        INFO;

        // ディーラーが合計値17以上になるまで引き続ける
        while (array_sum($dealer->getCardRanks()) < 17) {
            $dealerDrawCard = $dealer->drawCard();
            $this->dealerCards[] = $dealerDrawCard;

            echo "ディーラーの引いたカードは{$dealerDrawCard->getCardString()}です。" . PHP_EOL;
        }

        // 結果の表示
        $resultMessage = <<< RESULT
        あなたの得点は{$playerScore}です。
        ディーラーの得点は{$dealerScore}です。

        RESULT;
    }

}
