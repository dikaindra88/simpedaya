<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenerimaModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Penerima extends BaseController
{
    public function __construct()

    {
        $this->Option = new Options();
        $this->User = new UsersModel();
        $this->Penerima = new PenerimaModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Data Penerima',
                'user' => $this->User->getData(),
                'penerima' => $this->Penerima->getData()
            ];

            return view('data-penerima/V_penerima', $data);
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
    public function update($id_penerima)
    {
        $data = [
            'title' => 'CBN | Data Penerima Update',
            'user' => $this->User->getData(),
            'penerima' => $this->Penerima->getDetail($id_penerima)
        ];
        // dd($data);
        return view('data-penerima/V_update', $data);
    }

    public function insert()
    {

        $data = [
            'nama_penerima' => $this->request->getPost('nama_penerima'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'usia_penerima' => $this->request->getPost('usia_penerima'),
            'status_penerima' => $this->request->getPost('status_penerima'),
            'alamat_penerima' => $this->request->getPost('alamat_penerima')
        ];

        $this->Penerima->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan..!!');
        //dd($data);
        return redirect()->to('/Data-penerima-bantuan');
    }
    public function editAction($id_penerima)
    {
        $data = [
            'id_penerima' => $id_penerima,
            'nama_penerima' => $this->request->getPost('nama_penerima'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'usia_penerima' => $this->request->getPost('usia_penerima'),
            'status_penerima' => $this->request->getPost('status_penerima'),
            'alamat_penerima' => $this->request->getPost('alamat_penerima')
        ];
        $this->Penerima->editData($data);

        session()->setFlashdata('pesan', 'Data Berhasil diubah..!!');
        return redirect()->to('/Data-penerima-bantuan');
    }
    public function delete($id_penerima)
    {
        $this->Penerima->deleteData($id_penerima);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus..!!');
        return redirect()->to('/Data-penerima-bantuan');
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
                'penerima' => $this->Penerima->getData()

            ];
            //dd($data);
            return view('data-penerima/print-penerima', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function pdf()
    {
        if (session()->get('nama') == True) {
            $data = [
                'user' => $this->User->getData(),
                'penerima' => $this->Penerima->getData()
            ];
            //dd($data);
            //return 
            $html = view('data-penerima/pdf-penerima', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('Report Data Penerima ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
}
