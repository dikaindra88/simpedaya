<?php

namespace App\Controllers;

use App\Models\DanakeluarModel;
use App\Models\DanamasukModel;
use App\Models\DonaturModel;
use App\Models\PenerimaModel;
use App\Models\UsersModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Keluar = new DanakeluarModel();
        $this->Masuk = new DanamasukModel();
        $this->User = new UsersModel();
        $this->Donate = new DonaturModel();
        $this->Penerima = new PenerimaModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Dashboard',
                'masuk' => $this->Masuk->countMasuk(),
                'user' => $this->User->getData(),
                'keluar' => $this->Keluar->countKeluar(),
                'penerima' => $this->Penerima->countPenerima(),
                'donate' => $this->Donate->countDonatur()
            ];
            return view('V_Dashboard', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
