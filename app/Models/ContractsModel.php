<?php

namespace App\Models;

use CodeIgniter\Model;

class ContractsModel extends Model
{
    protected $table      = 'contracts';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['company', 'site', 'start_period', 'end_period', 'contract_document', 'contract_commitment', 'partnership_objective', 'deleted_at'];

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
        return $this->db->table('contracts as con')
            ->select('con.id conid, co.name coname, se.name sename, con.start_period constart, con.end_period conend, con.contract_commitment concom, con.partnership_objective conpart')
            ->join('company as co', 'con.company = co.id')
            ->join('sites as se', 'con.site = se.id')
            ->where('con.deleted_at IS NULL')
            ->get()->getResultArray();
    }
}
