<?php

class Student
{
    

    public function __construct($name)
    {
        $this->category =   "Undefined";
        $this->name     =   $name;
    }

    public function info()
    {
        echo $this->category.'<br/>'.$this->name;        
    }

}


class formOne extends Student
{
    public function __construct($name)
    {
        $this->category =   "Form 1";
        $this->name     =   $name;
    }
}


class formTwo extends Student
{
    public function __construct($name)
    {
        $this->category =   "Form 2";
        $this->name     =   $name;
    }
}


$formTwo = new formTwo('Christian');
$formTwo->info();

?>