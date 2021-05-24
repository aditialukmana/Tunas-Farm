<?php

namespace App\Models;

use CodeIgniter\Model;

class GrowInstallationsModel extends Model
{
    protected $table      = 'grow_installations';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code', 'type', 'level_count', 'level_hole', 'hole', 'site', 'floor', 'status','deleted_at'];

    // protected $returnType = 'App\Entities\Devices';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getData($id = false)
    {
        if ($id == false) return $this->findAll();
        return $this->where(['id' => $id])->first();
    }
}
