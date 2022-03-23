<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Dealer.php');

class DealerTest extends TestCase
{
    function testChangeToStrings()
    {
        $card1 = new Card('h2');
        $card2 = new Card('c7');
        $dealer = new Dealer();

        $this->assertSame(['ハートの2', 'クラブの7'], $dealer->ChangeToStrings([$card1, $card2]));
    }

    function testChangeToCardRanks()
    {
        $card1 = new Card('h2');
        $card2 = new Card('c7');
        $dealer = new Dealer();

        $this->assertSame([2, 7], $dealer->changeToCardRanks([$card1, $card2]));
    }
}
