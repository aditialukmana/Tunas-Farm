<?php

namespace App\Models;

use CodeIgniter\Model;

class ActuatorDevicesModel extends Model
{
    protected $table      = 'actuatordevices';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['site','floor', 'device','airtemperature', 'humidity', 'acstart', 'acend', 'lightstart', 'lightend'];

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
