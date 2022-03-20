<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Game.php');

class GameTest extends TestCase
{
    function testGameStart()
    {
        $output = <<<OUT
        ブラックジャックを開始します。
        あなたの引いたカードはハートの2です。
        あなたの引いたカードはハートの2です。
        ディーラーの引いたカードはハートの2です。
        ディーラーの引いた2枚目のカードはわかりません。
        あなたの現在の得点は4です。カードを引きますか？（Y/N）
        OUT;

        $this->expectOutputString($output);

        $game = new Game();
        $game->gameStart();
    }
}
