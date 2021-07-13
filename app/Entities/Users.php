<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;
use Myth\Auth\Password;


class Users extends Entity
{
  public function setPassword(string $password)
  {
    $config = config('Auth');

    if (
      (defined('PASSWORD_ARGON2I') && $config->hashAlgorithm == PASSWORD_ARGON2I)
      ||
      (defined('PASSWORD_ARGON2ID') && $config->hashAlgorithm == PASSWORD_ARGON2ID)
    ) {
      $hashOptions = [
        'memory_cost' => $config->hashMemoryCost,
        'time_cost'   => $config->hashTimeCost,
        'threads'     => $config->hashThreads
      ];
    } else {
      $hashOptions = [
        'cost' => $config->hashCost
      ];
    }

    return $this->attributes['password_hash'] = password_hash(
      base64_encode(
        hash('sha384', $password, true)
      ),
      $config->hashAlgorithm,
      $hashOptions
    );
  }
}
