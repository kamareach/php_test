<?php
namespace reach\AnimalShelt;

//животное
abstract class Pet
{   
    abstract protected function getValue();

    protected $petByName; //кличка животного
    protected $petAge; // возраст животного
    protected $dt;// варемя создания
    protected $dateKicked;//дата когда животное отдали

    /* Общий метод */
    public function printOut()
    {
        print $this->getValue() . "\n";
    }
    
    public function getName()
    {
        return  $this->petByName;
    }

    public function getAge()
    {
        return  $this->petAge;
    }

    public function getDt()
    {
        return  $this->dt;
    }

    public function setDtKicked()
    {
        $this->dateKicked = new \DateTime();
    }

}
