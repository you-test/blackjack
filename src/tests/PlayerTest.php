<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Player.php');

class PlayerTest extends TestCase
{
    function testChangeToStrings()
    {
        $card1 = new Card('h2');
        $card2 = new Card('c7');
        $player = new Player();

        $this->assertSame(['ハートの2', 'クラブの7'], $player->ChangeToStrings([$card1, $card2]));
    }

    function testChangeToCardRanks()
    {
        $card1 = new Card('h2');
        $card2 = new Card('c7');
        $player = new Player();

        $this->assertSame([2, 7], $player->changeToCardRanks([$card1, $card2]));
    }
}
