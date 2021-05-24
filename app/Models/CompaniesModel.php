<?php

namespace App\Models;

use CodeIgniter\Model;

class CompaniesModel extends Model
{
    protected $table      = 'company';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['prefix_code','name', 'address', 'phone', 'email', 'deleted_at'];

    // protected $returnType = 'App\Entities\PlantDataLogs';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getData($id = false)
    {
        if ($id == false) return $this->findAll();
        return $this->where(['id' => $id])->first();
    }
}
