<?php

namespace App\Models;

use CodeIgniter\Model;

class SitesModel extends Model
{
    protected $table      = 'sites';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code','name', 'company', 'type', 'subtype', 'floor', 'building_area', 'photo', 'jalan', 'kota', 'provinsi', 'maps', 'building_status', 'rent_period', 'rent_cost', 'deleted_at'];

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
