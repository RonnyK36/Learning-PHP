<?php

require_once "Student.php";
require_once "Prefect.php";
// What is class and instance


$prefect = new Prefect("Lexie", "182", "prefect1");

echo '<pre>';
var_dump($prefect);
echo '<pre>';




$p = new Student("Kevin", "192");
$p->setGrade("B+");
echo '<pre>';
var_dump($p);
echo '<pre>';
echo $p->getGrade();

$student1 = new Student("Guy", 345);
$student1->setGrade("A");
echo '<pre>';
var_dump($student1);
echo '<pre>';
echo $student1->getGrade() . "<br>";

echo Student::getCounter();

// Create Person class in Person.php

// Create instance of Person

// Using setter and getter