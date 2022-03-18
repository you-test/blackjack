<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/Game.php');

class GameTest extends TestCase
{
    function testGameStart()
    {
        $output = <<<OUT
        ブラックジャックを開始します。
        あなたの引いたカードはハートの7です。
        あなたの引いたカードはクラブの8です。
        ディーラーの引いたカードはダイヤのQです。
        ディーラーの引いた2枚目のカードはわかりません。
        あなたの現在の得点は15です。カードを引きますか？（Y/N）
        OUT;

        $this->expectOutputString($output);

        $game = new Game();
        $game->gameStart();
    }
}
