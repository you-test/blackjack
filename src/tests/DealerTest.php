<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Dealer.php');

class DealerTest extends TestCase
{
    function testDrawCard()
    {
        $dealer = new Dealer();

        $this->assertSame('h2', $dealer->drawCard());
    }

    function testChangeToStrings()
    {
        $dealer = new Dealer();

        $this->assertSame(['ハートの2', 'クラブの7'], $dealer->ChangeToStrings(['h2', 'c7']));
    }

    function testChangeToCardRanks() {
        $dealer = new Dealer();

        $this->assertSame([2,7], $dealer->changeToCardRanks(['h2', 'c7']));
    }
}
