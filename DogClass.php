<?php
namespace reach\AnimalShelt;

include_once ("Pet.php");

class DogClass extends Pet
{
    protected $petByName; //кличка животного
    protected $petAge; // возраст животного
    protected $dt;

    function __construct($name, $age)
    {
        $this->petByName = $name;
        $this->petAge = $age;
        $this->dt = new \DateTime;
    } 

    protected function getValue() {
        return "DogClass";
    }
    
    public function __toString()
    {
        return "DOG";
    }
}
