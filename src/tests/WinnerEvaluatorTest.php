<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/WinnerEvaluator.php');

class WinnerEvaluatorTest extends TestCase
{
    public function testGetWinner()
    {
        $winnerEvaluator = new WinnerEvaluator();
        $this->assertSame('ディーラーの勝ちです。', $winnerEvaluator->getWinner(13, 15));
    }

}
