<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupsUsersModel extends Model
{
    protected $table      = 'auth_groups_users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['group_id', 'user_id'];

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
        return $this->db->table('auth_groups_users as gru')
            ->select('gru.id gruid, gru.group_id grurole, gru.user_id gruuser, ag.name agname, us.username usname')
            ->join('auth_groups as ag', 'gru.group_id = ag.id')
            ->join('users as us', 'gru.user_id = us.id')
            ->where('gru.deleted_at IS NULL')
            ->get()->getResultArray();
    }
}
