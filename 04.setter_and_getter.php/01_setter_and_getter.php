<?php
  class Person {
    private $firstname;
    private $lastname;
    private $gender;

    // Getter
    public function getFirstname() {
      return $this->firstname;
    }

    public function getLastname() {
      return $this->lastname;
    }

    public function getGender() {
      return $this->gender;
    }

    // Getter
    public function setFirstname($firstname) {
      $this->firstname = $firstname;
    }

    public function setLastname($lastname) {
      $this->lastname = $lastname;
    }

    public function setGender($gender) {
      $this->gender = $gender;
    }
  }

  $newPerson = new Person();
  $newPerson->setFirstname("Imam");
  $newPerson->setLastname("Firdaus Dwimeianto");
  $newPerson->setGender("Male");

  echo $newPerson->getFirstname()." ".$newPerson->getLastname()."<br>";
  echo $newPerson->getGender();
?>