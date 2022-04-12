<?php

namespace App\Controllers\Opd;

use App\Controllers\BaseController;
use App\Models\Opd\DataPegawaiOPDModel;
use App\Models\Opd\UsulanOPDModel;
use App\Models\Opd\DashboardPetugasModel;
use Config\Services;

class DataUsulan extends BaseController
{
	protected $M_pegawai;
	protected $M_usulan_OPD;
	protected $M_dashboard_opd;
	protected $request;
	protected $form_validation;
	//protected $session;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_usulan_OPD = new UsulanOPDModel($this->request);

		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->session->start();
		//$session = \Config\Services::session(); 
		$this->M_pegawai = new DataPegawaiOPDModel($this->request);

		$this->M_dashboard_opd = new DashboardPetugasModel($this->request);
	}


	// Halaman Data Usulan Petugas
	public function index()
	{
		$data['title']  = "App-SIP | Data Formasi";
		$data['page']   = "dataformasi";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

		$username   = $this->session->get('username');
		$data['get_petugas_by_login']  = $this->M_dashboard_opd->getPetugasNamaOpd($username)->getRow();

		$username   = $this->session->get('username');
		$idInstansi  = $this->M_usulan_OPD->getInstansiByLogin($username)->getResult();

		$data['getDetailFormasiUsulan'] = $this->M_usulan_OPD->getKebutuhanFormasi($idInstansi['0']->instansi_id)->getResult();

		// $data['get_data_usulan_found'] = $this->M_usulan_OPD->getDataUsulanFound($idInstansi['0']->instansi_id)->getResult();

		// echo "<pre>";
		// print_r($data['getDetailFormasi']);
		// die('stttop');

		return view('v_datausulan_petugas/index', $data);
	}

	public function inputusulanopd()
	{
		//session_start();

		$username   = $this->session->get('username');
		$idInstansi  = $this->M_usulan_OPD->getInstansiByLogin($username)->getResult();

		$data['get_petugas_by_login']  = $this->M_dashboard_opd->getPetugasNamaOpd($username)->getRow();

		$data = array(
			'instansi_id'       => $idInstansi['0']->instansi_id,
			'instansi_unor'     => $this->request->getPost('instansi_unor'),
			'tahun_usulan' 		=> date("Y"),
			'jabatan_kode' 		=> $this->request->getPost('jabatan_kode'),
			'jumlah_usulan' 	=> $this->request->getPost('jumlah_usulan_formasi'),
			'status_usulan_id' 	=> '1',
		);
		$inputusulanopd = $this->M_usulan_OPD->inputusulanopd($data);


		// echo "<pre>";
		// print_r($data);
		// print_r($inputusulanopd);
		// die('stop');

		/* 1 belum verifikasi */
		/* 2 proses verifikasi */
		/* 3 sudah verifikasi */

		// echo "<pre>";
		// print_r($data);
		// die('sttop');



		if (isset($inputusulanopd)) {
			$data['message_success'] = "Usulan anda telah berhasil di tambahkan";

			$data['title']     = 'Data Input Usulan';
			$data['page']      = "opd/datausulan/inputusulanopd";
			$data['nama']      = $this->session->get('nama');
			$data['email']     = $this->session->get('email');


			$data['getDetailFormasiUsulan'] = $this->M_usulan_OPD->getKebutuhanFormasi($idInstansi['0']->instansi_id)->getResult();

			$session = session();

			$session->setFlashdata('success', 'User Updated successfully');

			return redirect()->to('/opd/datausulan/');
		} else {
			$data['message_failed'] = "Data Usulan anda gagal di update. Silahkan cek dan coba kembali !";

			// return view('v_datausulan_petugas/update', $data);
		}








		//      if($inputusulanopd){
		// 	$this->session->set_flashdata('notif_tambah','<div class="alert alert-success" role="alert"> Data Berhasil di simpan. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		// 	redirect(site_url('admin/admin'));
		// 	/*redirect($_SERVER['HTTP_REFERER']);*/
		// } else {
		// 	$this->session->set_flashdata('status_duplicate_data', '<strong> Maaf, Data gagal di tambahkan. Username/email sudah digunakan. Silahkan gunakan username/email yang lain.</strong>');
		// 	redirect($_SERVER['HTTP_REFERER']);
		// }

		//return redirect()->to('Opd/DataUsulan/index');
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


	// Halaman Data Lihat Usulan
	public function lihatusulanopd()
	{
		$data['title']  = "App-SIP | Data Formasi";
		$data['page']   = "dataformasi";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

		$username   = $this->session->get('username');
		$data['get_petugas_by_login']  = $this->M_dashboard_opd->getPetugasNamaOpd($username)->getRow();

		$username   = $this->session->get('username');
		$idInstansi  = $this->M_usulan_OPD->getInstansiByLogin($username)->getResult();

		$data['getLihatUsulan'] = $this->M_usulan_OPD->getLihatUsulan($idInstansi['0']->instansi_id)->getResult();

		// echo "<pre>";
		// print_r($data['getDetailFormasi']);
		// die('stttop');

		return view('v_lihat_datausulan_petugas/index', $data);
	}


	// Halaman Data Cetak Data Pegawai
	public function cetakdatausulan()
	{
		$data['title']  = "App-SIP | Data Formasi";
		$data['page']   = "dataformasi";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

		$username   = $this->session->get('username');
		$idInstansi  = $this->M_usulan_OPD->getInstansiByLogin($username)->getResult();

		$getIDInstansi = $idInstansi['0']->instansi_id;
		$data['getnamaInstansi'] = $this->M_pegawai->getnamaInstansi($getIDInstansi)->getResult();

		$data['getLihatUsulan'] = $this->M_usulan_OPD->getLihatUsulan($idInstansi['0']->instansi_id)->getResult();




		//$data['getPegawaiByInstansi'] = $this->M_pegawai->getPegawaiByInstansiID($getIDInstansi)->getResult();

		// echo "<pre>";
		// print_r($data['getnamaInstansi'][0]->instansi_nama);
		// die('sttop');

		return view('v_dataUsulan_petugas/cetak', $data);
	}
}

/* End of file DataFormasi.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Controllers/DataFormasi.php */