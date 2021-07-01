<?php

namespace App\Models;

use CodeIgniter\Model;

class DevicesModel extends Model
{
    protected $table      = 'devices';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code', 'site', 'grow_installation', 'status','deleted_at'];

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
        return $this->db->table('devices as de')
        ->select('de.id deid, de.code decode, de.status destatus, se.id seid, se.name sename, gr.id grid, gr.code grcode')
        ->join('sites as se', 'de.site = se.id')
        ->join('grow_installations as gr', 'de.grow_installation = gr.id')
        ->where('de.deleted_at IS NULL')
        ->get()->getResultArray();
    }
}
