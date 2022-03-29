<?php

class WinnerEvaluator
{
    public function getWinner(int $playerScore, int $dealerScore)
    {
        $winner = '引き分けです';
        if ($playerScore < $dealerScore) {
            $winner = 'ディーラーの勝ちです。';
        }
        if ($playerScore > $dealerScore) {
            $winner = 'あなたの勝ちです。';
        }
        return $winner;
    }
}
