<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class Companies extends Entity
{
  public function setPrefixCode(string $pref)
  {

    $arr = explode(" ",$pref);
    $skt = '';

    foreach($arr as $kata) {
        $skt .= substr($kata, 0, 1);
    }

    return $skt;
  }
}
