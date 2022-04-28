<?php
  class Fruit {
    public $name;
    protected $color;
    private $weight;
    public function __construct($name, $color, $weight) {
      $this->name = $name;
      $this->color = $color;
      $this->weight = $weight;
    }

    public function getColor() {
      return $this->color;
    }

    public function getWeight() {
      return $this->weight;
    }
  }
  
  // Strawberry is inherited from Fruit
  class Strawberry extends Fruit {
    public function getWeightStrawberry() {
      return $this->Weight;
    }
  }

  $strawberry = new Strawberry("Strawberry", "red", 300);
  
  echo $strawberry->name."<br>";

  // error
  // echo $strawberry->color."<br>";
  // echo $strawberry->weight."<br>";
  // echo $strawberry->getWeightStrawberry()."<br>";

  // access private and protected
  echo $strawberry->getColor()."<br>";
  echo $strawberry->getWeight()."<br>";
?>