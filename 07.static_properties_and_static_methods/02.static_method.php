<?php
class domain {
  public static $ext = '.com';

  public static function checkWebsiteExt() {
    return self::getWebsiteName()." has extension: ".self::$ext;
  }
  
  protected static function getWebsiteName() {
    return "W3Schools.com";
  }
}

class domainW3 extends domain {
  public $websiteName;
  public function __construct() {
    $this->websiteName = parent::getWebsiteName();
  }
}

$domainW3 = new domainW3;
echo $domainW3 -> websiteName."<br>";

echo domain::checkWebsiteExt()."<br>";
echo domainW3::checkWebsiteExt()."<br>";
?>