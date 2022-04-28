<?php
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

// object instantiation
$apple = new Fruit();
$banana = new Fruit();

// access method
$apple->set_name('Apple');
$banana->set_name('Banana');

// access properties
echo $apple->name;
echo "<br>";
echo $banana->name;
?>