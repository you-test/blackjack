<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/WinnerEvaluatorOfOne.php');

class WinnerEvaluatorOfOneTest extends TestCase
{
    public function testGetWinner()
    {
        $evaluator = new WinnerEvaluatorOfOne();

        $this->assertSame('勝者はプレイヤーです。', $evaluator->getWinner([22], 18));
        $this->assertSame('引き分けです。', $evaluator->getWinner([18], 18));
        $this->assertSame('勝者はディーラーです。', $evaluator->getWinner([25], 19));
    }

}
