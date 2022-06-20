<?php
class Student
{
    public string  $name;
    public string $reg_no;
    protected string $grade;
    public static int $counter = 0;

    public function __construct($name, $reg_no)
    {

        $this->name = $name;
        $this->reg_no = $reg_no;
        self::$counter++;

        // echo $name . " " . $reg_no;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
    }
    public function getGrade()
    {
        return $this->grade;
    }

    public static function getCounter()
    {
        return self::$counter;
    }
}
