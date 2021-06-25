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
}
