<?php

Interface User
{
    public function drawCard();

    public function changeToStrings(array $cards);

    public function changeToCardRanks(array $cards);
}
