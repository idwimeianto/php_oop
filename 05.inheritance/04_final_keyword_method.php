<?php
class Fruit {
  final public function intro() {
    // some code
  }
}

class Strawberry extends Fruit {
  // will result in error
  public function intro() {
    // some code
  }
}

// output
// Fatal error: Cannot override final method Fruit::intro() in 
?>