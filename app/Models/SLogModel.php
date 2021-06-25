<?php

namespace App\Models;

use CodeIgniter\Model;

class SLogModel extends Model
{
    protected $table      = 'systemlogs';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['user','controller', 'message', 'deleted_at'];


    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getData()
    {
        return $this->findAll();
    }
}
