<?php

class Card
{
    public function __construct(private string $cardString)
    {
    }

    public function getCardString()
    {
        return $this->cardString;
    }

    public function getCardRanks()
    {

    }
}
