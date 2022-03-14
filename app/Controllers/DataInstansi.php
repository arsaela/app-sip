<?php

namespace App\Controllers;

use App\Models\InstansiModel;
use Config\Services;

class DataInstansi extends BaseController
{
	protected $session;
	protected $M_instansi;
	protected $request;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_instansi = new InstansiModel($this->request);
		$this->session = \Config\Services::session();
	}

	// Tombol Aksi Pada Tabel Data Instansi
	private function _action($idInstansi)
	{
		$link = "
		      	<a href='" . base_url('dataformasi/view/'.$idInstansi) . "' class='btn-viewInstansi' data-toggle='tooltip' data-placement='top' title='View'>
		      		<button type='button' class='btn btn-outline-primary btn-xs'><i class='far fa-eye'></i></button>
		      	</a>
		    ";
		return $link;
	}

	// Halaman Data Instansi
	public function index()
	{
		$data['title']   = "App-SIP | Data Instansi";
		$data['page']    = "datainstansi";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');
		return view('v_dataFormasi/index', $data);
	}

	// Datatable server side
	public function ajaxDataInstansi()
	{

		if ($this->request->getMethod(true) == 'POST') {
			$lists = $this->M_instansi->get_datatables();
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
				"recordsTotal" 		=> $this->M_instansi->count_all(),
				"recordsFiltered" 	=> $this->M_instansi->count_filtered(),
				"data" 				=> $data
			];
			echo json_encode($output);
		}
	}


}

/* End of file DataInstansi.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Controllers/DataInstansi.php */
