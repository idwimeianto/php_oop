<?php
class Fruit {
  // Constructor Property Promotion
  function __construct(public $name, public $color) {
  }
}

$apple = new Fruit("Apple", "red");
echo $apple->name;
echo "<br>";
echo $apple->color;
echo "<br>";
?>