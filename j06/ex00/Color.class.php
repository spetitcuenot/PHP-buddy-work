<?php
class Color {
    public static $verbose = False;
    public $red;
    public $green;
    public $blue;

    public function __construct($array) {
        if (isset($array['rgb']))
        {
            $this->red = ($array['rgb'] & 0xFF);
            $this->green = (($array['rgb'] & 0xFF00) >> 8);
            $this->blue = (($array['rgb'] & 0xFF0000) >> 16);
        }
        else
        {
            $this->red = $array['red'];
            $this->green = $array['green'];
            $this->blue = $array['blue'];
        }
        if (Color::$verbose)
            print ("Color( red: ". str_repeat(" ", 3 - strlen(intval($this->red))) . intval($this->red)
                .", green: ". str_repeat(" ", 3 - strlen(intval($this->green))) . intval($this->green)
                .", blue: ". str_repeat(" ", 3 - strlen(intval($this->blue))) . intval($this->blue)
                ." ) constructed.". PHP_EOL);
    }

    public function __destruct()
    {
        if (Color::$verbose)
            print ("Color( red: ". str_repeat(" ", 3 - strlen(intval($this->red))) . intval($this->red)
                .", green: ". str_repeat(" ", 3 - strlen(intval($this->green))) . intval($this->green)
                .", blue: ". str_repeat(" ", 3 - strlen(intval($this->blue))) . intval($this->blue)
                ." ) destructed.". PHP_EOL);
    }

    public function add($rhs) {
        return new Color(array(
            'red' => $this->red + $rhs->red,
            'green' => $this->green + $rhs->green,
            'blue' => $this->blue + $rhs->blue,
        ));
    }

    public function sub($rhs) {
        return new Color(array(
            'red' => $this->red - $rhs->red,
            'green' => $this->green - $rhs->green,
            'blue' => $this->blue - $rhs->blue,
        ));
    }

    public function mult($f) {
        return new Color(array(
            'red' => $this->red * $f,
            'green' => $this->green * $f,
            'blue' => $this->blue * $f,
        ));
    }

    public function __toString()
    {
        return "Color( red: ". str_repeat(" ", 3 - strlen(intval($this->red))) . intval($this->red)
            .", green: ". str_repeat(" ", 3 - strlen(intval($this->green))) . intval($this->green)
            .", blue: ". str_repeat(" ", 3 - strlen(intval($this->blue))) . intval($this->blue)
            ." )";
    }

    public static function doc()
    {
        return file_get_contents(__DIR__ .'/Color.doc.txt');
    }
}
