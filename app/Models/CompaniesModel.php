<?php

namespace App\Models;

use CodeIgniter\Model;

class CompaniesModel extends Model
{
    protected $table      = 'company';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['prefix_code', 'name', 'address', 'customer', 'phone', 'email', 'deleted_at'];

    // protected $returnType = 'App\Entities\PlantDataLogs';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getData($id = false)
    {
        if ($id == false) return $this->findAll();
        return $this->where(['id' => $id])->first();
    }

    public function joinData()
    {
        return $this->db->table('customers as cu')
        ->select('co.id coid, cu.name cuname, co.name coname, co.phone cophone, co.email coemail, co.prefix_code cocode')
        ->join('company as co', 'co.customer = cu.id')
        ->where('co.deleted_at IS NULL')
        ->get()->getResultArray();
    }
}
    