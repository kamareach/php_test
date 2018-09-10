<?php
namespace reach\AnimalShelt;

include_once ("Pet.php");

class CatClass extends Pet
{
    protected $petByName; //кличка животного
    protected $petAge; // возраст животного
    protected $dt;  //дата создания объекта

    function __construct($name, $age)
    {
        $this->petByName = $name;
        $this->petAge = $age;
        $this->dt = new \DateTime();
    }

    protected function getValue() {
        return "CatClass";
    }

    public function __toString()
    {
        return "CAT";
    }
}
