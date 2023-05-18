<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ApproveModel;
use App\Models\DanamasukModel;
use App\Models\DonaturModel;
use App\Models\JenisModel;
use App\Models\SatuanModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class DanaMasuk extends BaseController
{
    public function __construct()
    {
        $this->Option = new Options();
        $this->User = new UsersModel();
        $this->Masuk = new DanamasukModel();
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
                'title' => 'CBN | Dana Masuk',
                'user' => $this->User->getData(),
                'in' => $this->Masuk->getData(),
                'satuan' => $this->Satuan->getData(),
                'jenis' => $this->Jenis->getData(),
                'donate' => $this->Donate->getData(),
                'approve' => $this->Approv->getData()
            ];

            return view('dana-masuk/V_masuk', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function getDetail()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Dana Masuk Detail',
                'user' => $this->User->getData(),
                'in' => $this->Masuk->getData(),
                'satuan' => $this->Satuan->getData(),
                'jenis' => $this->Jenis->getData(),
                'donate' => $this->Donate->getData(),
                'approve' => $this->Approv->getData()
            ];
            //dd($data);
            return view('dana-masuk/V_detail', $data);
        } else {
            return redirect()->to('/');
        }
    }


    public function update($id_masuk)
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Dana Masuk Update',
                'user' => $this->User->getData(),
                'in' => $this->Masuk->getDetail($id_masuk),
                'satuan' => $this->Satuan->getData(),
                'jenis' => $this->Jenis->getData(),
                'donate' => $this->Donate->getData(),
                'approve' => $this->Approv->getData()
            ];
            // dd($data);
            return view('dana-masuk/V_update', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function insert()
    {
        $bukti_tf = $this->request->getFile('bukti_tf');
        $nama_file = $bukti_tf->getName();
        $data = [
            'id_donatur' => $this->request->getPost('id_donatur'),
            'tgl_masuk' => $this->request->getPost('tgl_masuk'),
            'kd_jenis' => $this->request->getPost('kd_jenis'),
            'dana_masuk' => $this->request->getPost('dana_masuk'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'bukti_tf' => $nama_file,
            'id_approve' => '2'
        ];

        $bukti_tf->move('bukti-tf/', $nama_file);
        $this->Masuk->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan..!!');
        //dd($data);
        return redirect()->to('/Dana-masuk');
    }
    public function editAction($id_masuk)
    {
        $bukti_tf = $this->request->getFile('bukti_tf');
        if ($bukti_tf->getError() == 4) {
            $data = [
                'id_masuk' => $id_masuk,
                'id_donatur' => $this->request->getPost('id_donatur'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'kd_jenis' => $this->request->getPost('kd_jenis'),
                'dana_masuk' => $this->request->getPost('dana_masuk'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'keterangan' => $this->request->getPost('keterangan'),
                'id_approve' =>  $this->request->getPost('id_approve')
            ];
            $this->Masuk->editData($data);
        } else {
            $bukti_tf = $this->request->getFile('bukti_tf');
            $nama_file = $bukti_tf->getName();
            $data = [
                'id_masuk' => $id_masuk,
                'id_donatur' => $this->request->getPost('id_donatur'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
                'kd_jenis' => $this->request->getPost('kd_jenis'),
                'dana_masuk' => $this->request->getPost('dana_masuk'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'keterangan' => $this->request->getPost('keterangan'),
                'bukti_tf' => $nama_file,
                'id_approve' =>  $this->request->getPost('id_approve')
            ];
            // upload file foto
            $bukti_tf->move('bukti-tf/', $nama_file);

            $this->Masuk->editData($data);
        }
        session()->setFlashdata('pesan', 'Data Berhasil diubah..!!');
        return redirect()->to('/Dana-masuk');
    }
    public function delete($id_partin)
    {

        $this->Masuk->deleteData($id_partin);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus..!!');
        return redirect()->to('/Dana-masuk');
    }


    public function alert()
    {
        if (session()->get('nama') == True) {
            return view('report/alert');
        } else {
            return redirect()->to('/');
        }
    }

    public function in()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Report Dana Masuk',
                'masuk' => $this->Masuk->getData2(),
                'sum' => $this->Masuk->countDana(),
                'user' => $this->User->getData(),
                'satuan' => $this->Satuan->getData(),
                'first_date' => '',
                'end_date' => '',
                'id_satuan' => ''

            ];
            // dd($data);
            return view('report/V_report_masuk', $data);
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
                'title' => 'CBN | Report Dana Masuk',
                'masuk' => $this->Masuk->getDetail2($first_date, $end_date, $id_satuan),
                'sum' => $this->Masuk->countDana2($first_date, $end_date, $id_satuan),
                'satuan' => $this->Satuan->getData(),
                'user' => $this->User->getData(),
                'first_date' => $first_date,
                'end_date' => $end_date,
                'id_satuan' => $id_satuan
            ];
            //dd($data);
            return view('report/V_report_masuk', $data);
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
                'in' => $this->Masuk->getDetail2($first, $end, $id_satuan),
                'sum' => $this->Masuk->countDana2($first, $end, $id_satuan),
                'masuk' => $this->Masuk->getData(),
                'first_date' => $first,
                'end_date' => $end,
                'id_satuan' => $id_satuan

            ];
            //dd($data);
            return view('report/print-masuk', $data);
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

                'masuk' => $this->Masuk->getDetail2($first, $end, $id_satuan),
                'sum' => $this->Masuk->countDana2($first, $end, $id_satuan),
                'first_date' => $first_date . '/' . $end_date . '/' . $mid_date,
                'end_date' => $first_date1 . '/' . $end_date1 . '/' . $mid_date1,
                'id_satuan' => $id_satuan

            ];
            //dd($data);
            //return 
            $html = view('report/pdf-masuk', $data);

            $this->Option->setIsRemoteEnabled(true);
            $this->Option->setIsHtml5ParserEnabled(true);
            $op = $this->Option->set('chroot', realpath(''));
            $dompdf = new Dompdf($op);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->render();
            $dompdf->stream('Report Dana Masuk ' . date('F Y') . '.pdf');
        } else {
            return redirect()->to('/');
        }
    }
}
