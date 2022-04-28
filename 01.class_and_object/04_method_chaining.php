<?php
class StringMutator {
  protected $word;

  public function __construct($word) 
  {
      $this->word = $word;
  }

  public function bold() {
      $this->word = '<b>' . $this->word . '</b>';
      return $this;
  }

  public function italic() {
      $this->word = '<i>' . $this->word . '</i>';
      return $this;
  }
  
  public function underscore() {
      $this->word = '<u>' . $this->word . '</u>';
      return $this;
  }
  
  public function get() {
      return $this->word;
  }
}

  $word = 'Saya Belajar Method Chaining';

  // Membuat object dan mendefinisikan string yang akan diolah 
  $string_mutator = new StringMutator($word); 

  // Contoh 1
  // Operasi bold
  $result = $string_mutator->bold()->get();
  echo $result;

  echo '<hr/>';

  // Contoh 2
  // Operasi bold + italic
  $result = $string_mutator->bold()->italic()->get();
  echo $result;
  echo '<hr/>';

  // Contoh 3
  // Operasi bold + italic + underscore
  $result = $string_mutator->bold()->italic()->underscore()->get();
  echo $result;
?>