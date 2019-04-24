<?php
require_once 'Vertex.class.php';

class Vector
{
    public static $verbose;
    private $_x;
    private $_y;
    private $_z;
    private $_w;

    public function __construct($array)
    {
        $this->_dest = $array['dest'];
        $this->_orig = $array['orig'];
        if (Vector::$verbose)
            print("$this constructed". PHP_EOL);
    }

    public function __destruct()
    {
        if (Vector::$verbose)
            print("$this destructed". PHP_EOL);
    }

    public function __toString()
    {
        return Vector::$verbose ? "Vertex( x: " . number_format($this->_x, 2)
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

    public function getY()
    {
        return $this->_y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function getW()
    {
        return $this->_w;
    }

    public static function doc()
    {
        return file_get_contents(__DIR__ . '/Vector.doc.txt');
    }
}
