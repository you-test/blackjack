<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Player.php');

class PlayerTest extends TestCase
{
    function testDrawCard()
    {
        $player = new Player();

        $this->assertSame('h2', $player->drawCard());
    }

    function testChangeToStrings()
    {
        $player = new Player();

        $this->assertSame(['ハートの2', 'クラブの7'], $player->ChangeToStrings(['h2', 'c7']));
    }

    function testChangeToCardRanks() {
        $player = new Player();

        $this->assertSame([2,2], $player->changeToCardRanks(['h2', 'c2']));
    }
}
