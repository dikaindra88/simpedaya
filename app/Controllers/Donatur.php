<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DonaturModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Donatur extends BaseController
{
    public function __construct()

    {
        $this->Option = new Options();
        $this->User = new UsersModel();
        $this->Donate = new DonaturModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Data Donatur',
                'user' => $this->User->getData(),
                'donate' => $this->Donate->getData()
            ];

            return view('data-donatur/V_donatur', $data);
        } else {
            return redirect()->to('/');
        }
    }
    // public function getDetail($id_keluar)
    // {
    //     $data = [
    //         'title' => 'CBN | Data Donatur Detail',
    //         'user' => $this->User->getData(),
    //         'out' => $this->Keluar->getDetail($id_keluar),
    //         'satuan' => $this->Satuan->getData(),
    //         'jenis' => $this->Jenis->getData(),
    //         'donate' => $this->Donate->getData(),
    //         'approve' => $this->Approv->getData()
    //     ];
    //     //dd($data);
    //     return view('dana-keluar/V_detail', $data);
    // }
    public function update($id_donatur)
    {
        $data = [
            'title' => 'CBN | Data Donatur Update',
            'user' => $this->User->getData(),
            'donate' => $this->Donate->getDetail($id_donatur)
        ];
        // dd($data);
        return view('data-donatur/V_update', $data);
    }

    public function insert()
    {

        $data = [
            'nama_donatur' => $this->request->getPost('nama_donatur'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'usia' => $this->request->getPost('usia'),
            'status' => $this->request->getPost('status'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $this->Donate->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan..!!');
        //dd($data);
        return redirect()->to('/Data-donatur');
    }
    public function editAction($id_donatur)
    {
        $data = [
            'id_donatur' => $id_donatur,
            'nama_donatur' => $this->request->getPost('nama_donatur'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'usia' => $this->request->getPost('usia'),
            'status' => $this->request->getPost('status'),
            'alamat' => $this->request->getPost('alamat')
        ];
        $this->Donate->editData($data);

        session()->setFlashdata('pesan', 'Data Berhasil diubah..!!');
        return redirect()->to('/Data-donatur');
    }
    public function delete($id_donatur)
    {
        $this->Donate->deleteData($id_donatur);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus..!!');
        return redirect()->to('/Data-donatur');
    }

    public function alert()
    {
        if (session()->get('nama') == True) {
            return view('report/alert');
        } else {
            return redirect()->to('/');
        }
    }

    public function print()
    {
        if (session()->get('nama') == True) {
            $data = [
                'user' => $this->User->getData(),
                'donate' => $this->Donate->getData()

            ];
            //dd($data);
            return view('data-donatur/print-donatur', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function pdf()
    {
        if (session()->get('nama') == True) {
            $data = [
                'user' => $this->User->getData(),
                'donate' => $this->Donate->getData()
            ];
            //dd($data);
            //return 
            $html = view('data-donatur/pdf-donatur', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('Report Data Donatur ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
}
