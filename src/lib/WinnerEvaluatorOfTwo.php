<?php

class WinnerEvaluatorOfTwo
{
    public function getWinner(array $playersScore, int $dealerScore): string
    {
        $winner = '勝者はプレイヤーです';
        if (min(abs($playersScore[0])) === abs($dealerScore)) {
            $winner = '引き分けです。';
        }
        if (abs($playersScore[0]) > abs($dealerScore)) {
            $winner = '勝者はディーラーです。';
        }
        return $winner;
    }
}
