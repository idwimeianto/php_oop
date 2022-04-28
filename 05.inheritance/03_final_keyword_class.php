<?php
final class Fruit {
  // some code
}

// will result in error
class Strawberry extends Fruit {
  // some code
}

// output
// Fatal error: Class Strawberry cannot extend final class Fruit in
?>