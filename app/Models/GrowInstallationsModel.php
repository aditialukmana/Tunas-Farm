<?php

namespace App\Models;

use CodeIgniter\Model;

class GrowInstallationsModel extends Model
{
    protected $table      = 'grow_installations';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code', 'customer', 'company', 'type', 'level_count', 'level_hole', 'hole', 'site', 'floor', 'status', 'deleted_at'];

    // protected $returnType = 'App\Entities\Devices';

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
        return $this->db->table('grow_installations as gr')
            ->select('gr.id grid, gr.code grcode, cu.id cuid, cu.name cuname, co.id coid, co.name coname, se.id seid, se.name sename, gr.type grtype, gr.status grstatus')
            ->join('customers as cu', 'gr.customer = cu.id')
            ->join('company as co', 'gr.company = co.id')
            ->join('sites as se', 'gr.site = se.id')
            ->get()->getResultArray();
    }
}
