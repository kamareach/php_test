<?php
namespace reach\AnimalShelt;

// Показываем все ошибки
error_reporting(E_ALL);

include_once ("Pet.php");
include_once ("DogClass.php");
include_once ("CatClass.php");
include_once ("TurtleClass.php");


class Shelt
{
    private $PetsArray  = []; //животные в приюте
    private $PetsKickedArr = []; //животные которых отдали


    //поместить в приют
    public function putPet($byName, $type, $age)
    {

        switch ($type) {
            case "CAT":
                $this->PetsArray[] = new CatClass($byName, $age);
                break;
            case "DOG":
                $this->PetsArray[] = new DogClass($byName, $age);
                break;
            case "TURTLE":
                $this->PetsArray[] = new TurtleClass($byName, $age);
                break;
            default:
                echo "Приют не принимает другие типы животных"."\n";
                break;
        }
    }

    public function printPetsArr()
    {
        print_r($this->PetsArray);
    }

    public function comparePetsName($p1, $p2)
    {

        if(($p1 instanceof Pet) and  ($p1 instanceof Pet)) {
            return strcmp($p1->getName(),$p2->getName());
        }
        return 0;
    }

    public function comparePetsTimeStay($p1, $p2)
    {
        if (($p1 instanceof Pet) and  ($p1 instanceof Pet)) {
            if ($p1->getDt() > $p2->getDt()) {
                return 1;
            }elseif ($p1->getDt() < $p2->getDt()) {
                return -1;
            }else {
                return 0;
            }
        }
        return 0;
    }


    //посмотреть всех животных определенного типа отсортированных по кличке
    public function viewAllPetsByTypeOrderByName($type)
    {
        $petsOneType = [];
        
        foreach ($this->PetsArray as $value) {
            if ($type==$value) {
                $petsOneType[] = $value;

            }
        }
        
        usort($petsOneType, array($this, "comparePetsName"));
        return $petsOneType;
    }

    //отдаем животное с самым длительным сроком нахождения
    public function kickPetWithLongestStay()
    {

       if (count($this->PetsArray) > 0) {
           
           usort($this->PetsArray, array($this,"comparePetsTimeStay"));
           $verySadAnimal = $this->PetsArray[0];
           $verySadAnimal->setDtKicked();
           $this->PetsKickedArr[] = $verySadAnimal;
           unset($this->PetsArray[0]);
           $this->PetsArray = array_values($this->PetsArray);

           return $verySadAnimal;
           
       }

    }

    public function kickPetWithLongestStayByType($type)
    {
       if (count($this->PetsArray) > 0 ){

            $petsOneType = [];

            foreach ($this->PetsArray as $value) {
                if ($type==$value)
                {
                    $petsOneType[] = $value;

                }
            }
           
           if (count($petsOneType) > 0) {
               usort($petsOneType,array($this, "comparePetsTimeStay"));
               $verySadAnimal = $petsOneType[0];
               $verySadAnimal->setDtKicked();
               $this->PetsKickedArr[] = $verySadAnimal;
               $this->PetsArray = array_values($this->PetsArray);

               return $this->PetsKickedArr[count($this->PetsKickedArr)-1];
           }
       }

    }
}
