<?php

class Pet {
    public $id;
    public $name;
    public $cuteness;
    public $age;
    public $typeid;
    public $picture;

    public function __construct($id, $name, $cuteness, $age, $typeid, $picture) {
        $this->id = $id;
        $this->name = $name;
        $this->cuteness = $cuteness;
        $this->age = $age;
        $this->typeid = $typeid;
        $this->picture = $picture;
    }
}