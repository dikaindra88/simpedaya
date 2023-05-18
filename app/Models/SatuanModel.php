<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_satuan';
    protected $primaryKey       = 'id_satuan';
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
        return $this->db->table('tb_satuan')->get()->getResultArray();
    }
    public function getDetail($id_satuan)
    {
        return $this->db->table('tb_satuan')
            ->where('tb_satuan.id_satuan', $id_satuan)
            ->get()->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_satuan')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tb_satuan')
            ->where('id_satuan', $data['id_satuan'])
            ->update($data);
    }

    public function deleteData($id_satuan)
    {
        $this->db->table('tb_satuan')->delete(array('id_satuan' => $id_satuan));
    }
}
