<?php

namespace App\Models;

use CodeIgniter\Model;

class SeedlingModel extends Model
{
    protected $table      = 'seedling';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code', 'sprouting', 'seedling', 'tanggal', 'sisa', 'reject', 'status', 'id_tanaman'];

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
        return $this->db->table('seedling as se')
            ->select('se.id seid, se.code secode, sp.id spid, sp.code spcode, se.seedling seseedling, se.tanggal setanggal, se.sisa sesisa, se.reject sereject, se.status sestatus, se.id_tanaman setanaman, se.status sestatus')
            ->join('sprouting as sp', 'se.sprouting = sp.id')
            ->where('se.deleted_at IS NULL')
            ->get()->getResultArray();
    }
}
