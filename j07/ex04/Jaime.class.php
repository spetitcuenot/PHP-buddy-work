<?php

class Jaime
{
    public function sleepWith($c) {
        if ($c instanceof Sansa)
            print("Let's do this." . PHP_EOL);
        else if ($c instanceof Cersei)
            print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
        else
            print("Not even if I'm drunk !" . PHP_EOL);
    }
}
