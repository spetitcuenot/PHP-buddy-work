<?php
require_once 'Color.class.php';

class Vertex
{
    public static $verbose;
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;

    public function __construct($array)
    {
        $this->_x = $array['x'];
        $this->_y = $array['y'];
        $this->_z = $array['z'];
        $this->_w = isset($array['w']) ? $array['w'] : 1.00;
        $this->_color = isset($array['color']) ? $array['color'] : new Color(array(
            'red' => 255,
            'blue' => 255,
            'green' => 255,
        ));
        if (Vertex::$verbose)
            print("$this constructed". PHP_EOL);
    }

    public function __destruct()
    {
        if (Vertex::$verbose)
            print("$this destructed". PHP_EOL);
    }

    public function __toString()
    {
        return Vertex::$verbose ? "Vertex( x: " . number_format($this->_x, 2)
            . ", y: " . number_format($this->_y, 2)
            . ", z:" . number_format($this->_z, 2)
            . ", w:" . number_format($this->_w, 2)
            . ", " . $this->_color . " )" : "Vertex( x: " . number_format($this->_x, 2)
            . ", y: " . number_format($this->_y, 2)
            . ", z:" . number_format($this->_z, 2)
            . ", w:" . number_format($this->_w, 2) . " )";
    }

    public function getX()
    {
        return $this->_x;
    }

    public function setX($x)
    {
        $this->_x = $x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function setY($y)
    {
        $this->_y = $y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function setZ($z)
    {
        $this->_z = $z;
    }

    public function getW()
    {
        return $this->_w;
    }

    public function setW($w)
    {
        $this->_w = $w;
    }

    public function getColor()
    {
        return $this->_color;
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }

    public static function doc()
    {
        return file_get_contents(__DIR__ . '/Vertex.doc.txt');
    }
}
