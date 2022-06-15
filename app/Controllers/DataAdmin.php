<?php

namespace App\Controllers;

use App\Models\AdminModel;
use Config\Services;

class DataAdmin extends BaseController
{
    protected $encrypter;
    protected $M_admin;
    protected $request;
    protected $form_validation;
    protected $session;


    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->request = Services::request();
        $this->M_admin = new AdminModel($this->request);
        $this->form_validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    // Tombol Aksi Pada Tabel Data Admin
    private function _action($idAdmin)
    {
        $link = "
        <a data-toggle='tooltip' data-placement='top' class='btn-editAdmin' title='Update' value='" . $idAdmin . "'>
        <button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'><i class='fa fa-edit'></i></button>
        </a>

        <a href='" . base_url('dataadmin/delete/' . $idAdmin) . "' class='btn-deleteAdmin' data-toggle='tooltip' data-placement='top' title='Delete'>
        <button type='button' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash'></i></button>
        </a>
        ";
        return $link;
    }

    // Halaman Data Admin
    public function index()
    {
        $data['title']  = "App-SIP | Data Admin";
        $data['page']   = "dataadmin";
        $data['nama']   = $this->session->get('nama');
        $data['email']   = $this->session->get('email');

        $data['validation'] = \Config\Services::validation();

        return view('v_dataadmin/index', $data);
    }

    // Add Data Admin
    public function add()
    {
        $validation = \Config\Services::validation();
        $username = $this->request->getPost('username2');
        $admin_nama = $this->request->getPost('admin_nama2');
        $admin_no_hp = $this->request->getPost('admin_no_hp2');
        $admin_email = $this->request->getPost('admin_email2');
        $admin_password = $this->request->getPost('admin_password2');

        if (!$this->validate([
            'username2' => 'required'
        ])) {
            $validation = \Config\Services::validation();
        }

        // if (!$this->validate([
        //     'username2' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} Harus diisi'
        //         ]
        //     ],
        //     'admin_nama2' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} Harus diisi'
        //         ]
        //     ],            
        //     'admin_no_hp2' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} Harus diisi'
        //         ]
        //     ],            
        //     'admin_email2' => [
        //         'rules' => 'required|valid_email',
        //         'errors' => [
        //             'required' => '{field} Harus diisi',
        //             'valid_email' => 'Format Email Harus Valid'
        //         ]
        //     ],
        //     'admin_password2' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} Harus diisi'
        //         ]
        //     ],
        //     'admin_password_conf' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} Harus diisi'
        //         ]
        //     ]
        // ])) {
        //     session()->setFlashdata('error', $this->validator->listErrors());
        //     return redirect()->back()->withInput();
        // } else {
        //     echo "<pre>";
        //     var_dump($this->request->getVar());
        //     echo "</pre>";
        // }






















        //Data Admin
        $data = [
            'username' => $username,
            'admin_nama' => $admin_nama,
            'admin_no_hp' => $admin_no_hp,
            'admin_email' => $admin_email
        ];

        $data2 = [
            'username' => $username,
            'password'    =>  base64_encode($this->encrypter->encrypt($admin_password)),
            'hak_akses'   => 'admin'
        ];

