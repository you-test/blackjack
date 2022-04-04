<?php

require_once('WinnerEvaluator.php');

class WinnerEvaluatorOfThree implements WinnerEvaluator
{
    private const BASE_NUMBER = 21;

    public function getWinner(array $playersScore, int $dealerScore): string
    {
        $absPlayer1 = abs($playersScore[0] - self::BASE_NUMBER);
        $absPlayer2 = abs($playersScore[1] - self::BASE_NUMBER);
        $absPlayer3 = abs($playersScore[2] - self::BASE_NUMBER);
        $absDealer = abs($dealerScore - self::BASE_NUMBER);
        $absPlayers = [$absPlayer1, $absPlayer2, $absPlayer3];
        // 勝者がプレイヤーとディーラー
        if (min($absPlayers) === $absDealer) {
            // プレイヤーは1人が勝者
            if (count(array_unique($absPlayers)) === 3) {
                $minKey = array_keys($absPlayers, min($absPlayers));
                $minPlayerKey = $minKey[0] + 1;
                return "勝者はプレイヤー{$minPlayerKey}とディーラーです。";
            }
            // プレイヤーは2人が勝者
            if (count(array_unique($absPlayers)) === 2) {
                $minKey = array_keys($absPlayers, min($absPlayers));
                $minPlayerKey1 = $minKey[0] + 1;
                $minPlayerKey2 = $minKey[1] + 1;
                return "勝者はプレイヤー{$minPlayerKey1}とプレイヤー{$minPlayerKey2}です。";
            }
        }
        // 勝者がプレイヤー
        if (min($absPlayers) < $absDealer) {
            // プレイヤー1人が勝者
            if (count(array_unique($absPlayers)) === 3) {
                $minKey = array_keys($absPlayers, min($absPlayers));
                $minPlayerKey = $minKey[0] + 1;
                return '勝者はプレイヤー' . $minPlayerKey . 'です。';
            }
            // プレイヤー2人が勝者
            if (count(array_unique($absPlayers)) === 2) {
                $minKey = array_keys($absPlayers, min($absPlayers));
                $minPlayerKey1 = $minKey[0] + 1;
                $minPlayerKey2 = $minKey[1] + 1;
                return "勝者はプレイヤー{$minPlayerKey1}とプレイヤー{$minPlayerKey2}です。";
            }
            // プレイヤー3人が勝者
            if (count(array_unique($absPlayers)) === 3) {
                return '勝者はプレイヤー全員です。';
            }
        }
        // 勝者がディーラー
        if (min($absPlayers) > $absDealer) {
            return '勝者はディーラーです。';
        }
        // 全員引き分け
        if (count(array_unique($absPlayers)) === 1 && $absPlayers[0] = $absDealer) {
            return '引き分けです。';
        }
    }
}
