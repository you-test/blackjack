<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/WinnerEvaluatorOfThree.php');

class WinnerEvaluatorOfThreeTest extends TestCase
{
    public function testWinnerEvaluatorOfThree()
    {
        $evaluator = new WinnerEvaluatorOfThree();

        $this->assertSame('勝者はプレイヤー1です。', $evaluator->getWinner([21, 23, 18], 18));
        $this->assertSame('勝者はプレイヤー2です。', $evaluator->getWinner([15, 22, 18], 18));
        $this->assertSame('勝者はプレイヤー3です。', $evaluator->getWinner([15, 22, 21], 18));
        $this->assertSame('勝者はプレイヤー1とプレイヤー2です。', $evaluator->getWinner([21, 21, 22], 18));
        $this->assertSame('勝者はプレイヤー2とプレイヤー3です。', $evaluator->getWinner([15, 21, 21], 18));
        $this->assertSame('勝者はプレイヤー全員です。', $evaluator->getWinner([21, 21, 21], 18));
        $this->assertSame('引き分けです。', $evaluator->getWinner([18, 18, 18], 18));
        $this->assertSame('勝者はディーラーです。', $evaluator->getWinner([25, 18, 25], 20));
    }

}
