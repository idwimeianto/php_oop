<?php
class Fruit {
  public $name;
  public $color;

  // Constructor
  function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }

  function get_name() {
    return $this->name;
  }

  function get_color() {
    return $this->color;
  }

  // Destructor
  function __destruct() {
    echo "The fruit is {$this->name} and the color is {$this->color}.";
  }
}

$apple = new Fruit("Apple", "red");
echo $apple->get_name();
echo "<br>";
echo $apple->get_color();
echo "<br>";
?>