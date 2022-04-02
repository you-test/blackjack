<?php

require_once('WinnerEvaluator.php');

class WinnerEvaluatorOfTwo implements WinnerEvaluator
{
    private const BASE_NUMBER = 21;

    public function getWinner(array $playersScore, int $dealerScore): string
    {
        $absPlayer1 = abs($playersScore[0] - self::BASE_NUMBER);
        $absPlayer2 = abs($playersScore[1] - self::BASE_NUMBER);
        $absDealer = abs($dealerScore - self::BASE_NUMBER);
        // 2人のプレイヤーが同点で勝者
        if (($absPlayer1 === $absPlayer2) && ($absPlayer1 < $absDealer)) {
            return '勝者はプレイヤー1とプレイヤー2です。';
        }
        // プレイヤーの内どちらか一方が勝者
        if (($absPlayer1 < $absPlayer2) && (min([$absPlayer1, $absPlayer2]) < $absDealer)) {
            return '勝者はプレイヤー1です。';
        }
        if (($absPlayer1 > $absPlayer2) && (min([$absPlayer1, $absPlayer2]) < $absDealer)) {
            return '勝者はプレイヤー2です。';
        }
        // 全員（ディーラー含めて）同点
        if (($absPlayer1 === $absPlayer2) && ($absPlayer2 === $absDealer)) {
            return '引き分けです。';
        }
        // ディーラーが勝者
        return '勝者はディーラーです。';
    }
}
