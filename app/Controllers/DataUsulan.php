<?php

namespace App\Controllers;

use App\Models\UsulanModel;
use Config\Services;

class DataUsulan extends BaseController
{
	protected $M_usulan;
	protected $request;
	protected $form_validation;
	protected $session;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_usulan = new UsulanModel($this->request);
		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
	}

	// Halaman Data usulan
	public function index()
	{
		$data['title']     = 'Data Usulan';
		$data['page']   = "datausulan";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

		$yearnow = date('Y');
		$data['getUsulan'] = $this->M_usulan->getUsulan($yearnow)->getResult();

		return view('v_dataUsulan/index', $data);
	}

	// Halaman Data Prodi
	public function detail_usulan($idUsulan)
	{
		$data['title']  = "App-SIP | Data Usulan";
		$data['page']   = "datausulan";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

		$data['getDetailUsulan'] = $this->M_usulan->getDetailUsulan($idUsulan)->getResult();
		//$data['getUsulanID'] = $this->M_usulan->getDetailUsulan($idUsulan)->getResult();
		//$data['getUsulan'] = $this->M_usulan->getUsulan($idUsulan)->getResult();

		return view('v_dataUsulan/detail_data_usulan', $data);
	}

	public function detail_pegawai_usulan()
	{
		if ($this->request->isAJAX()) {
			$idUnor =   $this->request->getVar('instansiunor');
			$idJabatan =  $this->request->getVar('jabatankode');
			$data = $this->M_usulan->getDetailPegawaiUsulan($idUnor, $idJabatan)->getResult();
			echo json_encode($data);
		}
	}

	public function approval_usulan_by_id($id)
	{
		$id = $this->request->getPost('detail_usulan_id');
		$data = array(
			'jumlah_approve'            => $this->request->getPost('jumlah_approve'),
			'status_usulan_id'      	=> '3',
			'keterangan'      		    => '-',
		);

		$this->M_usulan->updateApprovalUsulan($data, $id);

		$dataredirect['page']   = "Detail_data_usulan";
		$dataredirect['nama']   = $this->session->get('nama');
		$dataredirect['email']   = $this->session->get('email');

		// print_r($id);
		// die('STPPPPP');
		return redirect()->back();
	}


	public function reject_usulan_by_id($id)
	{
		$id = $this->request->getPost('detail_usulan_id');
		$data = array(
			'jumlah_approve'    => '0',
			'keterangan'        => $this->request->getPost('keterangan'),
			'status_usulan_id'     => '4',
		);

		$this->M_usulan->updateRejectUsulan($data, $id);

		$dataredirect['page']   = "Detail_data_usulan";
		$dataredirect['nama']   = $this->session->get('nama');
		$dataredirect['email']   = $this->session->get('email');

		// print_r($id);
		// die('STPPPPP');
		return redirect()->back();
	}

	public function get_pegawai_by_unor_and_instansi($idJabatan)
	{
		$data['page']   = "Get Data Pegawai by unor opd";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

		#$getPegawaiByUnorAndInstansi = $this->M_usulan->getPegawaiByUnorAndInstansi($idJabatan)->getResult();


		return view('v_dataUsulan/index', $data);
	}


	
}
