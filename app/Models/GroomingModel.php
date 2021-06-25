<?php

namespace App\Models;

use CodeIgniter\Model;

class GroomingModel extends Model
{
    protected $table      = 'grooming';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code', 'seedling', 'tower_level', 'tanggal', 'terproses', 'sisa', 'status', 'id_tanaman'];

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
        return $this->db->table('grooming as gr')
        ->select('gr.id grid, se.code secode, gr.code grcode, gr.tower_level grtwrlvl, gr.tanggal grtanggal, gr.terproses grterproses, gr.sisa grsisa, gr.status grstatus, gr.id_tanaman grtanaman')
        ->join('seedling as se', 'gr.seedling = se.id')
        ->where('gr.deleted_at IS NULL')
        ->get()->getResultArray();
    }
}
