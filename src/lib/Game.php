<?php

require_once('Player.php');
require_once('Dealer.php');
require_once('WinnerEvaluator.php');

class Game
{
    private const FIRST_DRAW_CARDS_NUM = 2;

    // Cardインスタンスの配列
    private array $players = [];
    private array $playerCards = [];
    private array $dealerCards = [];

    public function gameStart()
    {
        // ゲームスタート時にプレイヤーの人数を選択する
        echo 'ブラックジャックを開始します。' . PHP_EOL;
        echo 'プレイヤーの人数を選択してください。（1人: 1, 2人: 2, 3人: 3)';
        $playerNum = trim(fgets(STDIN));

        // プレイヤーインスタンスを選択したプライヤー数分プロパティにセットする
        for ($i = 0; $i < $playerNum; $i++) {
            $this->players[] = new Player();
        }

        /**
         * プレイヤー外最初の2枚を引く
         * $this->playerCards = [['h2', 'c3'], ['c4', 'hq'], ...];
         */
        foreach ($this->players as $key => $player) {
            for ($i = 0; $i < self::FIRST_DRAW_CARDS_NUM; $i++) {
                $card = $player->drawCard();
                $this->playerCards[$key][] = $card;
            }
        }

        $playerSum = array_sum($player->getCardRanks());

        $dealer = new Dealer();
        // ディーラーが最初に２枚引く
        for ($i = 0; $i < self::FIRST_DRAW_CARDS_NUM; $i++) {
            $card = $dealer->drawCard();
            $this->dealerCards[] = $card;
        }

        // 自分以外のプレイヤー（CPU)の引いたカードを表示
        foreach ($this->playerCards as $playerNo => $playerCard) {
            $no = $playerNo + 1;
            echo "プレイヤー{$no}の引いたカードは{$playerCard[0]->getCardString()}です。" . PHP_EOL;
            echo "プレイヤー{$no}の引いたカードは{$playerCard[1]->getCardString()}です。" . PHP_EOL;
        }

        // ディーラーとカードと自分の現在の得点の表示
        $firstResultMessage = <<<FIRST
        ディーラーの引いたカードは{$dealerStringCards[0]}です。
        ディーラーの引いた2枚目のカードはわかりません。
        あなたの現在の得点は{$playerSum}です。カードを引きますか？（Y/N）
        FIRST;
        echo $firstResultMessage;

        // プレイヤーがカード引くか選択（ループ）
        $response = trim(fgets(STDIN));
        echo $response . PHP_EOL;

        $playerScore = array_sum($player->getCardRanks());
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
        echo $dealerCardInfoMessage . PHP_EOL;

        // ディーラーが合計値17以上になるまで引き続ける
        while (array_sum($dealer->getCardRanks()) < 17) {
            $dealerDrawCard = $dealer->drawCard();
            $this->dealerCards[] = $dealerDrawCard;

            echo "ディーラーの引いたカードは{$dealerDrawCard->getCardString()}です。" . PHP_EOL;
        }

        // 最終的な得点の表示
        $dealerScore = array_sum($dealer->getCardRanks());
        $resultMessage = <<< RESULT
        あなたの得点は{$playerScore}です。
        ディーラーの得点は{$dealerScore}です。
        RESULT;
        echo $resultMessage . PHP_EOL;

        // 勝敗の表示
        $winnerEvaluator = new WinnerEvaluator();
        $winner = $winnerEvaluator->getWinner($playerScore, $dealerScore);
        echo $winner . PHP_EOL;
        echo 'ブラックジャックを終了します。' . PHP_EOL;
    }
}
