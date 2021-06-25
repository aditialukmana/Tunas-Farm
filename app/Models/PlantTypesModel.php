<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantTypesModel extends Model
{
    protected $table      = 'planttypes';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code', 'name', 'image', 'est_harvest_time', 'est_weight', 'deleted_at'];

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function getData($id = false)
    {
        if ($id == false) return $this->findAll();
        return $this->where(['id' => $id])->first();
    }

    public function cekKode()
    {
        $query = $this->db->query("SELECT MAX(code) as kode from planttypes");
        $hasil = $query->getResult();
        dd($hasil->kode);
        if($hasil == 0) {
            $kode = "PT01";
        } else {
            $kode = $hasil['code'];    
        }
        return $kode;
    }
}
