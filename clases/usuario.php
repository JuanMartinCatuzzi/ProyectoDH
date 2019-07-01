<?php

class Usuario {

private $id;
private $name;
private $surname;
private $email;
private $bDate;
private $ocupation;

public function __construct($array){
if (isset($array["id"])) {
  $this->id = $array["id"];
  $this->password = $array["password"];
} else {
  $this->id = null;
  $this->password = password_hash($array["password"], PASSWORD_DEFAULT);
}

  $this->name = trim($array["name"]);
  $this->surname = trim($array["surname"]);
  $this->email = trim($array["email"]);
  $this->name = trim($array["name"]);
  $this->bDate = trim($array["bDate"]);
  $this->ocupation = trim($array["ocupation"]);
}

public function setName($name)
  {
    $this->name = $name;
    return $this;
  }
  public function setSurname($surname)
    {
      $this->surname = $surname;
      return $this;
    }
public function setEmail($email)
  {
    $this->email = $email;
    return $this;
  }
public function setPassword($password){
  $this->password=$password;
  return $this;
  }
  public function setbDate($bDate)
    {
      $this->bDate = $bDate;
      return $this;
    }
    public function setOcupation($ocupation)
      {
        $this->ocupation = $ocupation;
        return $this;
      }

      public function getName()
      {
        return $this->name;
      }
      public function getSurname()
      {
        return $this->surname;
      }
      public function getEmail()
      {
        return $this->email;
      }
      public function getPassword(){
        return $this->password;
      }
      public function getbDate()
      {
        return $this->bDate;
      }
      public function getOcupation()
      {
        return $this->ocupation;
      }
}


?>
