<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisModel;
use App\Models\SatuanModel;
use App\Models\UsersModel;

class Jenis extends BaseController
{
    public function __construct()

    {
        $this->User = new UsersModel();
        $this->Jenis = new JenisModel();
        $this->Satuan = new SatuanModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Data Jenis',
                'user' => $this->User->getData(),
                'satuan' => $this->Satuan->getData(),
                'jenis' => $this->Jenis->getData()
            ];

            return view('data-jenis/V_jenis', $data);
        } else {
            return redirect()->to('/');
        }
    }
    // public function getDetail($id_penerima)
    // {
    //     $data = [
    //         'title' => 'CBN | Dana Masuk Detail',
    //         'user' => $this->User->getData(),
    //         'penerima' => $this->Donate->getData(),
    //         'approve' => $this->Approv->getData()
    //     ];
    //     //dd($data);
    //     return view('dana-keluar/V_detail', $data);
    // }
    public function update($id_jenis)
    {
        $data = [
            'title' => 'CBN | Data Jenis Update',
            'user' => $this->User->getData(),
            'satuan' => $this->Satuan->getData(),
            'jenis' => $this->Jenis->getDetail($id_jenis)
        ];
        // dd($data);
        return view('data-jenis/V_update', $data);
    }

    public function insert()
    {

        $data = [
            'kd_jenis' => $this->request->getPost('kd_jenis'),
            'jenis' => $this->request->getPost('jenis'),
            'saldo' => 0,
            'id_satuan' => $this->request->getPost('id_satuan')
        ];

        $this->Jenis->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan..!!');
        //dd($data);
        return redirect()->to('/Data-jenis');
    }
    public function editAction($id_jenis)
    {
        $data = [
            'id_jenis' => $id_jenis,
            'kd_jenis' => $this->request->getPost('kd_jenis'),
            'jenis' => $this->request->getPost('jenis'),
            'id_satuan' => $this->request->getPost('id_satuan')
        ];
        $this->Jenis->editData($data);

        session()->setFlashdata('pesan', 'Data Berhasil diubah..!!');
        return redirect()->to('/Data-jenis');
    }
    public function delete($id_jenis)
    {
        $this->Jenis->deleteData($id_jenis);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus..!!');
        return redirect()->to('/Data-jenis');
    }
}
