<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getData()
    {
        return $this->db->table('users')->get()->getResultArray();
    }

    public function addData($data)
    {
        $this->db->table('users')
            ->insert($data);
    }

    public function login_user($email, $password)
    {
        return $this->db->table('users')->where(
            [
                'email' => $email,
                'password' => $password
            ]
        )->get()->getRowArray();
    }
    public function editData($data)
    {
        $this->db->table('users')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }
    public function getDetail($id_user)
    {
        return $this->db->table('users')
            ->where('users.id_user', $id_user)
            ->get()->getResultArray();
    }
    public function deleteUsers($id_user)
    {
        $this->db->table('users')->delete(array('id_user' => $id_user));
    }
}
