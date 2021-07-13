<?php

namespace App\Models;

use CodeIgniter\Model;

class PrivilegeSettingsModel extends Model
{
    protected $table      = 'privilegesettings';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['role', 'settings'];

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
        return $this->db->table('plantdatalogs as pd')
            ->select('pd.id pdid, de.code decode, gr.code grcode, pd.water pdwater, pd.air pdair, pd.humidity pdhumidity, pd.tds pdtds, pd.ph pdph')
            ->join('devices as de', 'pd.device = de.id')
            ->join('grow_installations as gr', 'pd.grow_installation = gr.id')
            ->where('pd.deleted_at IS NULL')
            ->get()->getResultArray();
    }
}
