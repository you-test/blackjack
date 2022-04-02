<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/WinnerEvaluatorOfTwo.php');

class WinnerEvaluatorOfTwoTest extends TestCase
{
    public function testWinnerEvaluatorOfTwo()
    {
        $evaluator = new WinnerEvaluatorOfTwo();

        $this->assertSame('勝者はプレイヤー1です。', $evaluator->getWinner([21, 23], 18));
        $this->assertSame('勝者はプレイヤー2です。', $evaluator->getWinner([15, 22], 18));
        $this->assertSame('勝者はプレイヤー1とプレイヤー2です。', $evaluator->getWinner([22, 22], 18));
        $this->assertSame('引き分けです。', $evaluator->getWinner([18, 18], 18));
        $this->assertSame('勝者はディーラーです。', $evaluator->getWinner([25, 18], 20));
    }

}
