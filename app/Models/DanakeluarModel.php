<?php

namespace App\Models;

use CodeIgniter\Model;

class DanakeluarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_keluar';
    protected $primaryKey       = 'id_keluar';
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

    public function countKeluar()
    {
        return $this->db->table('tb_keluar')
            ->where('id_approve =', 1)
            ->get()->getNumRows();
    }
    public function countDana()
    {
        return $this->db->table('tb_keluar')->selectSum('dana_keluar')->where('id_approve =', 1)->get()->getResultArray();
    }

    public function countDana2($first_date, $end_date, $id_satuan)
    {
        return $this->db->table('tb_keluar')
            ->selectSum('dana_keluar')->where('id_approve =', 1)
            ->where('tb_keluar.tgl_keluar >=', $first_date)
            ->where('tb_keluar.tgl_keluar <=', $end_date)
            ->where('tb_keluar.id_satuan', $id_satuan)
            ->get()->getResultArray();
    }

    public function getData()
    {
        return $this->db->table('tb_keluar')
            ->join('tb_jenis', 'tb_keluar.kd_jenis=tb_jenis.kd_jenis')
            ->join('tb_satuan', 'tb_keluar.id_satuan=tb_satuan.id_satuan')
            ->join('tb_approve', 'tb_keluar.id_approve=tb_approve.id_approve')
            ->get()->getResultArray();
    }
    public function getData2()
    {
        return $this->db->table('tb_keluar')
            ->join('tb_jenis', 'tb_keluar.kd_jenis=tb_jenis.kd_jenis')
            ->join('tb_satuan', 'tb_keluar.id_satuan=tb_satuan.id_satuan')
            ->join('tb_approve', 'tb_keluar.id_approve=tb_approve.id_approve')
            ->where('tb_keluar.id_approve =', 1)
            ->get()->getResultArray();
    }

    public function getDetail($id_keluar)
    {
        return $this->db->table('tb_keluar')
            ->join('tb_jenis', 'tb_keluar.kd_jenis=tb_jenis.kd_jenis')
            ->join('tb_satuan', 'tb_keluar.id_satuan=tb_satuan.id_satuan')
            ->join('tb_approve', 'tb_keluar.id_approve=tb_approve.id_approve')
            ->where('tb_keluar.id_keluar', $id_keluar)
            ->get()->getResultArray();
    }


    public function getDetail2($first_date, $end_date, $id_satuan)
    {
        return $this->db->table('tb_keluar')
            ->join('tb_jenis', 'tb_keluar.kd_jenis=tb_jenis.kd_jenis')
            ->join('tb_satuan', 'tb_keluar.id_satuan=tb_satuan.id_satuan')
            ->join('tb_approve', 'tb_keluar.id_approve=tb_approve.id_approve')
            ->where('tb_keluar.id_approve =', 1)
            ->where('tb_keluar.tgl_keluar >=', $first_date)
            ->where('tb_keluar.tgl_keluar <=', $end_date)
            ->where('tb_keluar.id_satuan =', $id_satuan)
            ->get()->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_keluar')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tb_keluar')
            ->where('id_keluar', $data['id_keluar'])
            ->update($data);
    }

    public function deleteData($id_keluar)
    {
        $this->db->table('tb_keluar')->delete(array('id_keluar' => $id_keluar));
    }
}
