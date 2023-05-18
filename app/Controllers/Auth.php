<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('Login');
    }

    public function __construct()
    {
        $this->User = new UsersModel();
        helper('form');
    }

    public function cek_login()
    {
        $validate = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} must be insert !!',
                    'valid_email' => 'Harus format email!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} must be insert !!',
                ],
            ]
        ]);
        if (!$validate) {
            return view('Login', ['validation' => $this->validator]);
        }
        // valid
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordx = md5($password);
        $cek_login = $this->User->login_user($email, $passwordx);
        if ($cek_login) {
            session()->set('nama', $cek_login['nama']);
            session()->set('email', $cek_login['email']);
            session()->set('status', $cek_login['status']);
            session()->set('id_user', $cek_login['id_user']);

            return redirect()->to(base_url('/Dashboard'));
        } else {
            session()->setFlashdata('pesan', 'Email atau Password salah..!!!');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('logout', 'Berhasil Logout');
        return redirect()->to(base_url('/'));
    }
}
