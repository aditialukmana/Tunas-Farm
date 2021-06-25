<?php

namespace App\Models;

use CodeIgniter\Model;

class TransplantingModel extends Model
{
    protected $table      = 'transplanting';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code', 'grooming', 'tower_level', 'tanggal', 'terproses', 'sisa', 'status', 'id_tanaman'];

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getData($id = false)
    {
        if ($id == false) return $this->findAll();
        return $this->where(['id' => $id])->first();
    }
}
