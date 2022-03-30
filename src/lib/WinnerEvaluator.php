<?php

class WinnerEvaluator
{
    private const EVALUATOR_NUM = 21;

    public function getWinner(int $playerScore, int $dealerScore)
    {
        $winner = '引き分けです';
        if (abs($playerScore - self::EVALUATOR_NUM) > abs($dealerScore - self::EVALUATOR_NUM)) {
            $winner = 'ディーラーの勝ちです。';
        }
        if (abs($playerScore - self::EVALUATOR_NUM) < abs($dealerScore - self::EVALUATOR_NUM)) {
            $winner = 'あなたの勝ちです。';
        }
        return $winner;
    }
}
