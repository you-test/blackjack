<?php

class WinnerEvaluatorOfOne
{
    public function getWinner(array $playersScore, int $dealerScore): string
    {
        $winner = '勝者はプレイヤーです';
        if (abs($playersScore[0]) === abs($dealerScore)) {
            $winner = '引き分けです。';
        }
        if (abs($playersScore[0]) > abs($dealerScore)) {
            $winner = '勝者はディーラーです。';
        }
        return $winner;
    }
}
