<?php

Interface WinnerEvaluator
{
    public function getWinner(array $playersScore, int $dealerScore);
}
