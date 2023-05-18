<?php

namespace App\Models;

use CodeIgniter\Model;

class DonaturModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_donatur';
    protected $primaryKey       = 'id_donatur';
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

    public function countDonatur()
    {
        return $this->db->table('tb_donatur')
            ->get()->getNumRows();
    }

    public function getData()
    {
        return $this->db->table('tb_donatur')->get()->getResultArray();
    }

    public function getDetail($id_donatur)
    {
        return $this->db->table('tb_donatur')
            ->where('tb_donatur.id_donatur', $id_donatur)
            ->get()->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_donatur')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tb_donatur')
            ->where('id_donatur', $data['id_donatur'])
            ->update($data);
    }

    public function deleteData($id_donatur)
    {
        $this->db->table('tb_donatur')->delete(array('id_donatur' => $id_donatur));
    }
}
