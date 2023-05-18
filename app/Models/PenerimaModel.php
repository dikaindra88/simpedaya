<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_penerima';
    protected $primaryKey       = 'id_penerima';
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

    public function countPenerima()
    {
        return $this->db->table('tb_penerima')
            ->get()->getNumRows();
    }

    public function getData()
    {
        return $this->db->table('tb_penerima')->get()->getResultArray();
    }

    public function getDetail($id_penerima)
    {
        return $this->db->table('tb_penerima')
            ->where('tb_penerima.id_penerima', $id_penerima)
            ->get()->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_penerima')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tb_penerima')
            ->where('id_penerima', $data['id_penerima'])
            ->update($data);
    }

    public function deleteData($id_penerima)
    {
        $this->db->table('tb_penerima')->delete(array('id_penerima' => $id_penerima));
    }
}
