<?php

namespace App\Controllers\Opd;
use App\Controllers\BaseController;

use App\Models\Opd\KebutuhanFormasiPetugasModel;
use App\Models\Opd\DashboardPetugasModel;
use Config\Services;

class DataKebutuhanFormasi extends BaseController
{
	protected $M_formasi_Petugas;
	protected $M_dashboard_opd;
	protected $request;
	protected $form_validation;
	protected $session;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_formasi_Petugas = new KebutuhanFormasiPetugasModel($this->request);

		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();

	
		$this->M_dashboard_opd = new DashboardPetugasModel($this->request);
		
	}

	
	// Halaman Data Prodi
	public function index()
	{
		$data['title']  = "App-SIP | Data Formasi";
		$data['page']   = "dataformasi";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');
		
		$username   = $this->session->get('username');
		$data['get_petugas_by_login']  = $this->M_dashboard_opd->getPetugasNamaOpd($username)->getRow();

		$username   = $this->session->get('username');
		$idInstansi  = $this->M_formasi_Petugas->getInstansiByLogin($username)->getResult();

		// $idInstansi = $this->session->get('instansi_id');
		$data['getDetailFormasi'] = $this->M_formasi_Petugas->getKebutuhanFormasi($idInstansi['0']->instansi_id)->getResult();

		// print_r($data['getDetailFormasi']);
		// die('stttop');

		foreach ($data['getDetailFormasi'] as $value) {
			$getJabatanNama = $value->jabatan_nama;
			$getJumlahASN = $value->jumlahasn;
			$getJumlahFormasi = $value->formasi_jumlah;

			$kebutuhanformasi = ($getJumlahASN)-($getJumlahFormasi);
			

			// $data['getFormasiExisting'] = $this->M_formasi_Petugas->getFormasiExisting($kebutuhanformasi)->getResult();
			
			// echo "<pre>";
			// print_r($getJabatanNama);
			// echo "jumlah asn =";
			// print_r($getJumlahASN);
			// echo "jumlah formasi =";
			// print_r($getJumlahFormasi);
			// echo "kebutuhanformasi =";
			// print_r($kebutuhanformasi);
			// die('sttop');

		} 
		// echo "<pre>";
		// print_r($data['getDetailFormasi']);
		// die('sttop');

		//echo $idInstansi;
		// print_r($idInstansi);
		// echo $idInstansi['0']->instansi_id;

		// die('stttopp');

		return view('v_dataKebutuhanFormasi_petugas/index', $data);
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