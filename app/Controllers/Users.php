<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Users extends BaseController
{
    public function __construct()
    {
        $this->User = new UsersModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Users',
                'user' => $this->User->getData()
            ];
            return view('Users/V_users', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function insert()
    {
        $foto = $this->request->getFile('foto');
        $nama_file = $foto->getName();
        $password = $this->request->getPost('password');
        $passx = md5($password);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => $passx,
            'status' => $this->request->getPost('status'),
            'foto' => $nama_file

        ];
        $foto->move('foto/', $nama_file);
        $this->User->addData($data);
        session()->setFlashdata('pesan', 'Selamat User Berhasil Ditambahkan');
        //dd($data);
        return redirect()->to('/Users-cbn');
    }
    public function update($id_user)
    {
        if (session()->get('nama') == True) {
            $data = [
                'title' => 'CBN | Update Users',
                'user' => $this->User->getDetail($id_user),
            ];
            //dd($data);
            return view('Users/V_update', $data);
        } else {
            return redirect()->to('/');
        }
    }


    public function EditAction($id_user)
    {
        $file = $this->request->getFile('foto');
        $password = $this->request->getPost('password');
        $passx = md5($password);
        if ($file->getError() == 4) {
            $data = [
                'id_user' => $id_user,
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => $passx,
                'status' => $this->request->getPost('status')
            ];
            $this->User->editData($data);
        } else {

            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getName();
            $data = [
                'id_user' => $id_user,
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => $passx,
                'status' => $this->request->getPost('status'),
                'foto' => $nama_file
            ];
            // upload file foto
            $file->move('foto/', $nama_file);

            $this->User->editData($data);
        }

        session()->setFlashdata('pesan', 'Data Successfully Updated.');
        return redirect()->to('/Users-cbn');
    }
    public function deleteData($id_user)
    {

        $this->User->deleteUsers($id_user);
        session()->setFlashdata('pesan', 'Data Successfully Deleted.');
        return redirect()->to('/Users-cbn');
    }
}
