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
        return view('v_dataadmin/index', $data);
    }

    // Add Data Admin
    public function add()
    {
        $username = $this->request->getPost('username2');
        $admin_nama = $this->request->getPost('admin_nama2');
        $admin_no_hp = $this->request->getPost('admin_no_hp2');
        $admin_email = $this->request->getPost('admin_email2');
        $admin_password = $this->request->getPost('admin_password2');

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

        //Simpan Data Admin
        $this->M_admin->save_admin_in_admin($data);
        $this->M_admin->save_admin_in_login($data2);

        $validasi = [
            'success'   => true
        ];
        echo json_encode($validasi);
    }

    // Menampilkan Data Admin Pada Modal Edit Data Admin
    public function ajaxUpdate($idAdmin)
    {
        $data = $this->M_admin->find($idAdmin);
        echo json_encode($data);
    }

    // Update Data Admin
    public function update()
    {
        $id = $this->request->getPost('idAdmin');
        $username = $this->request->getPost('username2');
        $admin_nama = $this->request->getPost('admin_nama2');
        $admin_no_hp = $this->request->getPost('admin_no_hp2');
        $admin_email = $this->request->getPost('admin_email2');
        $admin_password = $this->request->getPost('admin_password2');

        //Data Admin
        $data = [
            'id' => $id,
            'username' => $username,
            'admin_nama' => $admin_nama,
            'admin_no_hp' => $admin_no_hp,
            'admin_email' => $admin_email
            //'password'    =>  base64_encode($this->encrypter->encrypt($admin_password)),
            //'hak_akses'   => 'admin'
        ];
        $data2 = [
            'username'     => $username,
            'password'    =>  base64_encode($this->encrypter->encrypt($admin_password)),
            'hak_akses'   => 'admin'
        ];


        // print_r($data);
        // print_r($data2);
        // die('stop');

        //Update Data Admin
        $this->M_admin->update_admin_in_admin($data);
        $this->M_admin->update_admin_in_login($data2);
        $validasi = [
            'success'   => true
        ];
        echo json_encode($validasi);
    }

    // Delete Data Admin
    public function delete($id)
    {
        $this->M_admin->delete($id);
    }

    // Datatable server side
    public function ajaxDataAdmin()
    {

        if ($this->request->getMethod(true) == 'POST') {
            //$lists = $this->M_admin->get_datatables();
            $lists = $this->M_admin->get_admin()->getResult();
            $data = [];
            $no = $this->request->getPost("start");
            //$decrypted_string = $this->encrypt->decode($encrypted_password, $key);
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->username;
                $row[] = $this->encrypter->decrypt(base64_decode($list->password));
                $row[] = $list->admin_nama;
                $row[] = $list->admin_no_hp;
                $row[] = $list->admin_email;
                $row[] = $this->_action($list->id);
                $data[] = $row;
            }
            $output = [
                "draw"                 => $this->request->getPost('draw'),
                "recordsTotal"         => $this->M_admin->count_all(),
                "recordsFiltered"     => $this->M_admin->count_filtered(),
                "data"                 => $data
            ];
            echo json_encode($output);
        }
    }
}

/* End of file DataAdmin.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Controllers/DataAdmin.php */
