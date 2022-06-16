<?php namespace App\Controllers;

use App\Models\importDataModel;

class ImportPegawai extends BaseController
{
    protected $session;
    protected $ImportPegawai;

    public function __construct()
    {
        helper('form');
        $this->session = \Config\Services::session();
        $this->importDataModel = new importDataModel();
    }

    public function index(){ 
        $data = array(
            'title' => 'App-SIP | Import Data',
            'page' => 'import Data',
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'pegawai' => $this->importDataModel->alldata(),
        );

        return view('v_import_data/index', $data);
    }

    public function import($id){
      

        return redirect()->to('SetBatasUsulan/index');
    }
}