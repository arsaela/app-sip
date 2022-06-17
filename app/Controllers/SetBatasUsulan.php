<?php namespace App\Controllers;

use App\Models\BatasPengusulanModel;

class SetBatasUsulan extends BaseController
{
    protected $session;
    protected $BatasPengusulanModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->BatasPengusulanModel = new BatasPengusulanModel();
    }

    public function index(){
        $batasPengusulan = $this->BatasPengusulanModel->findAll();
        $data=[
            'title' => 'App-SIP | Set Batas Usulan',
            'page' => 'SetBatasUsulan',
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'batasPengusulan' => $batasPengusulan
        ];

        // $BatasPengusulanModel = new BatasPengusulanModel();
        // dd($batasPengusulan);
        return view('v_batasUsulan/index', $data);
    }

    public function update($id){
        // dd($this->request->getVar());
        $this->BatasPengusulanModel->save([
            'id' => $this->request->getVar('id'),
            'waktu' => $this->request->getVar('waktu')
        ]);

        return redirect()->to('SetBatasUsulan/index');
    }
}