<?php

namespace App\Controllers;

use App\Models\FormasiPetugasModel;
use Config\Services;

class DataFormasiPetugas extends BaseController
{
	protected $M_formasi_Petugas;
	protected $request;
	protected $form_validation;
	protected $session;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_formasi_Petugas = new FormasiPetugasModel($this->request);
		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		
	}

	
	// Halaman Data Prodi
	public function index()
	{
		$data['title']  = "App-SIP | Data Formasi";
		$data['page']   = "dataformasi";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

		$idInstansi = $this->session->get('instansi_id');
		$data['getDetailFormasi'] = $this->M_formasi_Petugas->getDetailFormasi($idInstansi)->getResult();

		print_r($data['getDetailFormasi']);
		die('stttopp');

		return view('v_dataFormasi_petugas/index', $data);
	}

	public function detail_pegawai()
	{
		if ($this->request->isAJAX()) {
			$idUnor =   $this->request->getVar('instansiunor');
			$idJabatan =  $this->request->getVar('jabatankode');
			$data = $this->M_formasi->getDetailPegawai($idUnor, $idJabatan)->getResult();
			echo json_encode($data);
		}
	}
}

/* End of file DataFormasi.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Controllers/DataFormasi.php */