<?php

require_once "Student.php";

class Prefect extends Student
{
    public string $prefectID;

    public function __construct($name, $reg_no, $prefectID)
    {
        $this->grade = "A+";
        $this->prefectID = $prefectID;
        parent::__construct($name, $reg_no);
    }
}
