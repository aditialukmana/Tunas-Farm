<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class Users extends Entity
{
  public function setPassword(string $pass)
  {
    $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
    return $this;
  }
}
