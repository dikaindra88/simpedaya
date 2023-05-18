<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_jenis';
    protected $primaryKey       = 'id_jenis';
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
        return $this->db->table('tb_jenis')
            ->join('tb_satuan', 'tb_jenis.id_satuan=tb_satuan.id_satuan')
            ->get()->getResultArray();
    }
    public function getDetail($id_jenis)
    {
        return $this->db->table('tb_jenis')
            ->join('tb_satuan', 'tb_jenis.id_satuan=tb_satuan.id_satuan')
            ->where('tb_jenis.id_jenis', $id_jenis)
            ->get()->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_jenis')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tb_jenis')
            ->where('id_jenis', $data['id_jenis'])
            ->update($data);
    }

    public function deleteData($id_jenis)
    {
        $this->db->table('tb_jenis')->delete(array('id_jenis' => $id_jenis));
    }
}
