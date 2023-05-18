<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SatuanModel;
use App\Models\UsersModel;

class Satuan extends BaseController
{
    public function __construct()

    {
        $this->User = new UsersModel();
        $this->Satuan = new SatuanModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Data Satuan',
                'user' => $this->User->getData(),
                'satuan' => $this->Satuan->getData()
            ];

            return view('data-satuan/V_satuan', $data);
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
    public function update($id_satuan)
    {
        $data = [
            'title' => 'CBN | Data Satuan Update',
            'user' => $this->User->getData(),
            'satuan' => $this->Satuan->getDetail($id_satuan)
        ];
        // dd($data);
        return view('data-satuan/V_update', $data);
    }

    public function insert()
    {

        $data = [
            'satuan' => $this->request->getPost('satuan')
        ];

        $this->Satuan->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan..!!');
        //dd($data);
        return redirect()->to('/Data-satuan');
    }
    public function editAction($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
            'satuan' => $this->request->getPost('satuan')
        ];
        $this->Satuan->editData($data);

        session()->setFlashdata('pesan', 'Data Berhasil diubah..!!');
        return redirect()->to('/Data-satuan');
    }
    public function delete($id_satuan)
    {
        $this->Satuan->deleteData($id_satuan);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus..!!');
        return redirect()->to('/Data-satuan');
    }
}
