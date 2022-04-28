<?php
class Goodbye {
  const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";

  // accessing class constant within the class
  public function byebye() {
    return self::LEAVING_MESSAGE;
  }
}

$goodbye = new Goodbye();
echo $goodbye->byebye()."<br>";

// accesing class constant outside the class
echo Goodbye::LEAVING_MESSAGE;
?>