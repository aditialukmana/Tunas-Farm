<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantDataLogsModel extends Model
{
    protected $table      = 'plantdatalogs';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['device', 'grow_installation', 'water', 'air', 'humidity', 'tds', 'ph', 'water_ink_status', 'deleted_at'];

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getData($id = false)
    {
        if ($id == false) return $this->findAll();
        return $this->where(['id' => $id])->first();
    }
}
