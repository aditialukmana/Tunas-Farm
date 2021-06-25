<?php

namespace App\Models;

use CodeIgniter\Model;

class ActuatorSitesModel extends Model
{
    protected $table      = 'actuator_sites';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['site', 'floor', 'ac_start_time', 'ac_end_time', 'light_start_time', 'light_end_time'];

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
