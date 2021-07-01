<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;


class Users extends Entity
{
  public function setPassword(string $pass)
  {
    $config = config('Auth');
    $this->attributes['password_hash'] = password_hash(base64_decode(hash('sha384', $pass, true)), $config->hashAlgorithm, [
      'cost' => $config->hashCost
    ]);
    return $this;
  }
}
