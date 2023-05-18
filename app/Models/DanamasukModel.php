<?php

namespace App\Models;

use CodeIgniter\Model;

class DanamasukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_masuk';
    protected $primaryKey       = 'id_masuk';
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

    public function countMasuk()
    {
        return $this->db->table('tb_masuk')
            ->where('id_approve =', 1)
            ->get()->getNumRows();
    }

    public function countDana()
    {
        return $this->db->table('tb_masuk')->selectSum('dana_masuk')->where('id_approve =', 1)->get()->getResultArray();
    }
    public function countDana2($first_date, $end_date, $id_satuan)
    {
        return $this->db->table('tb_masuk')
            ->selectSum('dana_masuk')->where('id_approve =', 1)
            ->where('tb_masuk.tgl_masuk >=', $first_date)
            ->where('tb_masuk.tgl_masuk <=', $end_date)
            ->where('tb_masuk.id_satuan', $id_satuan)
            ->get()->getResultArray();
    }

    public function getData()
    {
        return $this->db->table('tb_masuk')
            ->join('tb_jenis', 'tb_masuk.kd_jenis=tb_jenis.kd_jenis')
            ->join('tb_donatur', 'tb_masuk.id_donatur=tb_donatur.id_donatur')
            ->join('tb_satuan', 'tb_masuk.id_satuan=tb_satuan.id_satuan')
            ->join('tb_approve', 'tb_masuk.id_approve=tb_approve.id_approve')
            ->get()->getResultArray();
    }
    public function getData2()
    {
        return $this->db->table('tb_masuk')
            ->join('tb_jenis', 'tb_masuk.kd_jenis=tb_jenis.kd_jenis')
            ->join('tb_donatur', 'tb_masuk.id_donatur=tb_donatur.id_donatur')
            ->join('tb_satuan', 'tb_masuk.id_satuan=tb_satuan.id_satuan')
            ->join('tb_approve', 'tb_masuk.id_approve=tb_approve.id_approve')
            ->where('tb_masuk.id_approve =', 1)
            ->get()->getResultArray();
    }
    public function getDetail($id_masuk)
    {
        return $this->db->table('tb_masuk')
            ->join('tb_jenis', 'tb_masuk.kd_jenis=tb_jenis.kd_jenis')
            ->join('tb_donatur', 'tb_masuk.id_donatur=tb_donatur.id_donatur')
            ->join('tb_satuan', 'tb_masuk.id_satuan=tb_satuan.id_satuan')
            ->join('tb_approve', 'tb_masuk.id_approve=tb_approve.id_approve')
            ->where('tb_masuk.id_masuk', $id_masuk)
            ->get()->getResultArray();
    }

    public function getDetail2($first_date, $end_date, $id_satuan)
    {
        return $this->db->table('tb_masuk')
            ->join('tb_jenis', 'tb_masuk.kd_jenis=tb_jenis.kd_jenis')
            ->join('tb_donatur', 'tb_masuk.id_donatur=tb_donatur.id_donatur')
            ->join('tb_satuan', 'tb_masuk.id_satuan=tb_satuan.id_satuan')
            ->join('tb_approve', 'tb_masuk.id_approve=tb_approve.id_approve')
            ->where('tb_masuk.id_approve =', 1)
            ->where('tb_masuk.tgl_masuk >=', $first_date)
            ->where('tb_masuk.tgl_masuk <=', $end_date)
            ->where('tb_masuk.id_satuan', $id_satuan)
            ->get()->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_masuk')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tb_masuk')
            ->where('id_masuk', $data['id_masuk'])
            ->update($data);
    }

    public function deleteData($id_masuk)
    {
        $this->db->table('tb_masuk')->delete(array('id_masuk' => $id_masuk));
    }
}
