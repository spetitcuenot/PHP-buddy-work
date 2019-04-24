<?php

class UnholyFactory
{
    private $arr = [];

    public function absorb($fighter)
    {
        if ($fighter instanceof Fighter) {
            if (isset($this->arr[$fighter->name]))
                print("(Factory already absorbed a fighter of type $fighter->name)" . PHP_EOL);
            else {
                $this->arr[$fighter->name] = $fighter;
                print("(Factory absorbed a fighter of type $fighter->name)" . PHP_EOL);
            }
        } else
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
    }

    public function fabricate($name)
    {
        if (!isset($this->arr[$name])) {
            print("(Factory hasn't absorbed any fighter of type $name)" . PHP_EOL);
            return null;
        }
        print("(Factory fabricates a fighter of type $name)" . PHP_EOL);
        return $this->arr[$name];
    }
}
