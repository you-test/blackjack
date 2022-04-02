<?php

require_once('WinnerEvaluator.php');

class WinnerEvaluatorOfOne implements WinnerEvaluator
{
    private const BASE_NUMBER = 21;

    public function getWinner(array $playersScore, int $dealerScore): string
    {
        if (abs($playersScore[0] - self::BASE_NUMBER) === abs($dealerScore - self::BASE_NUMBER)) {
            return '引き分けです。';
        }
        if (abs($playersScore[0] - self::BASE_NUMBER) > abs($dealerScore - self::BASE_NUMBER)) {
            return '勝者はディーラーです。';
        }
        return '勝者はプレイヤーです。';
    }
}
