<?php
use reach\AnimalShelt;

include_once ("Shelt.php");

$ANIMALS =  array("DOG", "CAT", "TURTLE");

$shelt = new reach\AnimalShelt\Shelt();
//помещаем в приют животных
$shelt->putPet("Моня", $ANIMALS[2], 120);

$shelt->putPet("Бося", $ANIMALS[1], 20);
$shelt->putPet("Ася", $ANIMALS[1], 4);
$shelt->putPet("Мурка", $ANIMALS[1], 10);

$shelt->putPet("Альфред", $ANIMALS[0], 2);
$shelt->putPet("Бони", $ANIMALS[0], 5);
$shelt->putPet("Герцог", $ANIMALS[0], 12);
$shelt->putPet("Клавдий", $ANIMALS[0], 13);

//проверяем что попугаев быть у нас не может
$shelt->putPet("Альфред", "ПОПУГАЙ", 2);


print_r($shelt->viewAllPetsByTypeOrderByName($ANIMALS[1]));
//echo "Отдаем самого несчастно, им должен быть Моня по идее \n";
var_dump($shelt->kickPetWithLongestStay());
echo "-----------------------------\n";
//отдаем собаку которая дольше всех просидела
var_dump($shelt->kickPetWithLongestStayByType($ANIMALS[0]));

 echo "-----------------------------\n";
$shelt->printPetsArr();
?>
