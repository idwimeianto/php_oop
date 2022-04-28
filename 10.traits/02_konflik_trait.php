<?php

use message2 as GlobalMessage2;

trait message1 {
  public function msg() {
    echo "OOP is fun! ";
  }
}

trait message2 {
  public function msg() {
    echo "OOP reduces code duplication!";
  }
}

class Welcome {
  use message1, message2 {
    message1::msg insteadof message2;
    message2::msg as msg2;
  }
}


$obj = new Welcome();
$obj->msg();
echo "<br>";
$obj->msg2();
echo "<br>";
?>