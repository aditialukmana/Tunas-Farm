<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemLogsModel extends Model
{
    protected $table      = 'systemlogs';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['timestamp', 'user', 'controller', 'message', 'deleted_at'];

    // protected $returnType = 'App\Entities\Users';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getData($id = false)
    {
        if ($id == false) return $this->findAll();
        return $this->where(['id' => $id])->first();
    }
}
