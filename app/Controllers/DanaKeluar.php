<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ApproveModel;
use App\Models\DanakeluarModel;
use App\Models\DonaturModel;
use App\Models\JenisModel;
use App\Models\SatuanModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class DanaKeluar extends BaseController
{
    public function __construct()

    {
        $this->Option = new Options();
        $this->User = new UsersModel();
        $this->Keluar = new DanakeluarModel();
        $this->Satuan = new SatuanModel();
        $this->Jenis = new JenisModel();
        $this->Donate = new DonaturModel();
        $this->Approv = new ApproveModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Dana Keluar',
                'user' => $this->User->getData(),
                'out' => $this->Keluar->getData(),
                'satuan' => $this->Satuan->getData(),
                'jenis' => $this->Jenis->getData(),
                'donate' => $this->Donate->getData(),
                'approve' => $this->Approv->getData()
            ];

            return view('dana-keluar/V_keluar', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function getDetail($id_keluar)
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Dana Keluar Detail',
                'user' => $this->User->getData(),
                'out' => $this->Keluar->getDetail($id_keluar),
                'satuan' => $this->Satuan->getData(),
                'jenis' => $this->Jenis->getData(),
                'donate' => $this->Donate->getData(),
                'approve' => $this->Approv->getData()
            ];
            //dd($data);
            return view('dana-keluar/V_detail', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function update($id_keluar)
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Dana Keluar Update',
                'user' => $this->User->getData(),
                'out' => $this->Keluar->getDetail($id_keluar),
                'satuan' => $this->Satuan->getData(),
                'jenis' => $this->Jenis->getData(),
                'donate' => $this->Donate->getData(),
                'approve' => $this->Approv->getData()
            ];
            // dd($data);
            return view('dana-keluar/V_update', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function insert()
    {

        $data = [
            'tgl_keluar' => $this->request->getPost('tgl_keluar'),
            'kd_jenis' => $this->request->getPost('kd_jenis'),
            'dana_keluar' => $this->request->getPost('dana_keluar'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'id_approve' => '2'
        ];

        $this->Keluar->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan..!!');
        //dd($data);
        return redirect()->to('/Dana-keluar');
    }
    public function editAction($id_keluar)
    {
        $data = [
            'id_keluar' => $id_keluar,
            'tgl_keluar' => $this->request->getPost('tgl_keluar'),
            'kd_jenis' => $this->request->getPost('kd_jenis'),
            'dana_keluar' => $this->request->getPost('dana_keluar'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'id_approve' => $this->request->getPost('id_approve')
        ];
        $this->Keluar->editData($data);

        session()->setFlashdata('pesan', 'Data Berhasil diubah..!!');
        return redirect()->to('/Dana-keluar');
    }
    public function delete($id_keluar)
    {
        $this->Keluar->deleteData($id_keluar);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus..!!');
        return redirect()->to('/Dana-keluar');
    }

    public function alert()
    {
        if (session()->get('nama') == True) {
            return view('report/alert');
        } else {
            return redirect()->to('/');
        }
    }

    public function out()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Report Dana Keluar',
                'keluar' => $this->Keluar->getData2(),
                'sum' => $this->Keluar->countDana(),
                'user' => $this->User->getData(),
                'satuan' => $this->Satuan->getData(),
                'first_date' => '',
                'end_date' => '',
                'id_satuan' => ''

            ];
            // dd($data);
            return view('report/V_report_keluar', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function show()
    {
        if (session()->get('nama') == True) {
            $first_date = $this->request->getPost('first_date');
            $end_date = $this->request->getPost('end_date');
            $id_satuan = $this->request->getPost('id_satuan');
            $data = [
                'title' => 'CBN | Report Dana Keluar',
                'keluar' => $this->Keluar->getDetail2($first_date, $end_date, $id_satuan),
                'sum' => $this->Keluar->countDana2($first_date, $end_date, $id_satuan),
                'user' => $this->User->getData(),
                'satuan' => $this->Satuan->getData(),
                'first_date' => $first_date,
                'end_date' => $end_date,
                'id_satuan' => $id_satuan
            ];
            //dd($data);
            return view('report/V_report_keluar', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function print($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1, $id_satuan)
    {
        if (session()->get('nama') == True) {
            $first = $first_date . '/' . $end_date . '/' . $mid_date;
            $end = $first_date1 . '/' . $end_date1 . '/' . $mid_date1;

            $data = [
                'out' => $this->Keluar->getDetail2($first, $end, $id_satuan),
                'sum' => $this->Keluar->countDana2($first, $end, $id_satuan),
                'keluar' => $this->Keluar->getData(),
                'satuan' => $this->Satuan->getData(),
                'first_date' => $first,
                'end_date' => $end,
                'id_satuan' => $id_satuan


            ];
            //dd($data);
            return view('report/print-keluar', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function pdf($first_date, $end_date, $mid_date, $first_date1, $end_date1, $mid_date1, $id_satuan)
    {
        if (session()->get('nama') == True) {
            $first = $first_date . '/' . $end_date . '/' . $mid_date;
            $end = $first_date1 . '/' . $end_date1 . '/' . $mid_date1;
            $data = [

                'keluar' => $this->Keluar->getDetail2($first, $end, $id_satuan),
                'sum' => $this->Keluar->countDana2($first, $end, $id_satuan),
                'satuan' => $this->Satuan->getData(),
                'first_date' => $first_date . '/' . $end_date . '/' . $mid_date,
                'end_date' => $first_date1 . '/' . $end_date1 . '/' . $mid_date1,



            ];
            //dd($data);
            //return 
            $html = view('report/pdf-keluar', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('Report Dana keluar ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
}
