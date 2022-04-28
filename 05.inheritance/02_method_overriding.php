<?php
class Fruit {
  public $name;
  public $color;

  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }

  public function intro() {
    return "Method Intro from Parent Class: The fruit is {$this->name} and the color is {$this->color}.";
  }
}

class Strawberry extends Fruit {
  public $weight;
  
  public function __construct($name, $color, $weight) {
    parent::__construct($name, $color);
    $this->weight = $weight;
  }

  public function intro() {
    $parentIntroMethod = parent::intro();
    return $parentIntroMethod."<br>"."Method intro from child class: The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
  }
}

$strawberry = new Strawberry("Strawberry", "red", 50);
echo $strawberry->intro();
?>