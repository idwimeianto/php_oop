<?php
class pi {
  public static $value=3.14159;

  public function xStatic() {
    return self::$value;
  }
}

class x extends pi {
  public function xStaticChild() {
    // return self::$value;
    return parent::$value;
  }
}

// Get value of static property directly via parent class
echo pi::$value."<br>";

// Get value of static property directly via child class
echo x::$value."<br>";

// Get value of static property via xStatic() method in parent class
$y = new pi();
echo $y->xStatic()."<br>";

// Get value of static property via xStaticChild() method in child class
$x = new x();
echo $x->xStaticChild()."<br>";
?>