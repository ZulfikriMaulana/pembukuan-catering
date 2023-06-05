<?php

namespace App;

class Employee
{
    private $id;
    private $name;
    private $basicSalary;

    public function __construct($id, $name, $basicSalary)
    {
        $this->id = $id;
        $this->name = $name;
        $this->basicSalary = $basicSalary;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBasicSalary()
    {
        return $this->basicSalary;
    }
}
