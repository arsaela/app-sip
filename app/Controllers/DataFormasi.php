<?php

namespace App\Controllers;

use App\Models\FormasiModel;
use Config\Services;

class DataFormasi extends BaseController
{
	protected $session;
	protected $M_formasi;
	protected $request;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_formasi = new FormasiModel($this->request);
		$this->session = \Config\Services::session();
	}

	// Tombol Aksi Pada Tabel Data Formasi
	private function _action($idFormasi)
	{
		$link = "
		      	<a href='" . base_url('dataformasi/view/' . $idFormasi) . "' class='btn-viewFormasi' data-toggle='tooltip' data-placement='top' title='View'>
		      		<button type='button' class='btn btn-outline-primary btn-xs'><i class='far fa-eye'></i></button>
		      	</a>
		    ";
		return $link;
	}

	// Halaman Data Formasi
	public function index()
	{
		$data['title']   = "App-SIP | Data Formasi";
		$data['page']    = "dataformasi";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');
		return view('v_dataFormasi/index', $data);
	}

	// Datatable server side
	public function ajaxDataFormasi()
	{

		if ($this->request->getMethod(true) == 'POST') {
			$lists = $this->M_formasi->get_datatables();
			$data = [];
			$no = $this->request->getPost("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				$row[] = $list->instansi_nama;
				$row[] = $this->_action($list->instansi_id);
				$data[] = $row;
			}
			$output = [
				"draw" 				=> $this->request->getPost('draw'),
				"recordsTotal" 		=> $this->M_formasi->count_all(),
				"recordsFiltered" 	=> $this->M_formasi->count_filtered(),
				"data" 				=> $data
			];
			echo json_encode($output);
		}
	}
}

/* End of file DataFormasi.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Controllers/DataFormasi.php */
