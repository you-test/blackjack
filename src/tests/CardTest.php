<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Card.php');

class CardTest extends TestCase
{
    function testGetCardString()
    {
        $card = new Card('h3');
        $this->assertSame('ハートの3', $card->getCardString());
    }

    function testGetCardRank()
    {
        $card = new Card('h3');
        $this->assertSame(3, $card->getCardRank());
    }
}
