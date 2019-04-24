<?php

class NightsWatch implements IFighter
{
    public function recruit($fighter)
    {
        if ($fighter instanceof IFighter)
            $fighter->fight();
    }

    public function fight() {

    }
}
