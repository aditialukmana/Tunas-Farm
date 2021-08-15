<?php

namespace App\Models;

use CodeIgniter\Model;

class SproutingModel extends Model
{
    protected $table      = 'sprouting';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code', 'id', 'tipe_tanaman', 'benih', 'tanggal', 'sisa', 'reject', 'status', 'id_tanaman', 'deleted_at'];

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getData($id = false)
    {
        if ($id == false) return $this->findAll();
        return $this->where(['id' => $id])->first();
    }
}
