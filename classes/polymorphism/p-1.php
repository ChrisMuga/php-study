<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


interface Shape{
    public function Area();
}

#reclangle class.
class Rectangle implements Shape
{

    public function __construct( $width, $height )
    {

        $this->width    = $width;
        $this->height   = $height;
        $this->shape    = "Rectangle";
        
    }


    public function Area()
    {
        $this->area     = $this->width * $this->height;
        return 'Area of '.$this->shape.' = '.$this->area;
    }


}

#square
class Square implements Shape
{

    public function __construct($side)
    {
        $this->side     =   $side;
        $this->shape    =   "Square";
    }

    public function Area()
    {
        $this->area =   $this->side * $this->side;
        return 'Area of '.$this->shape.' = '.$this->area;
    }

}

#circle

class Circle implements Shape
{
    public function __construct($radius)
    {
        $this->radius   =   $radius;
        $this->shape    =   "Circle";
    }

    public function Area()
    {
        $this->area     =   $this->radius * $this->radius * pi();
        return 'Area of '.$this->shape.' = '.$this->area;
    }
}

$rect   =   new Rectangle(4,5);
echo $rect->Area();
echo '<hr/>';
$square =   new Square(5);
echo $square->Area();
echo '<hr/>';
$square =   new Circle(7);
echo $square->Area();