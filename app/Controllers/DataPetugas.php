<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use Config\Services;

class DataPetugas extends BaseController
{
	protected $M_petugas;
	protected $request;
	protected $form_validation;
	protected $session;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_petugas = new PetugasModel($this->request);
		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
	}

	// Tombol Aksi Pada Tabel Data Petugas
	private function _action($idPetugas)
	{
		$link = "
			<a data-toggle='tooltip' data-placement='top' class='btn-editPetugas' title='Update' value='" . $idPetugas . "'>
	      		<button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'><i class='fa fa-edit'></i></button>
	      	</a>
	      
	      	<a href='" . base_url('datapetugas/delete/' . $idPetugas) . "' class='btn-deletePetugas' data-toggle='tooltip' data-placement='top' title='Delete'>
	      		<button type='button' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash'></i></button>
	      	</a>
	    ";
		return $link;
	}

	// Halaman Data Petugas
	public function index()
	{
		$data['title']  = "App-PSIP | Data Petugas";
		$data['page']   = "datapetugas";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

		return view('v_datapetugas/index', $data);
	}

	// Add Data Petugas
	public function add()
	{

		$username = $this->request->getPost('username2');
		$petugas_nama = $this->request->getPost('petugas_nama2');
		$petugas_no_hp = $this->request->getPost('petugas_no_hp2');
		$petugas_email = $this->request->getPost('petugas_email2');

		//Data Petugas
		$data = [
			'username' => $username,
			'petugas_nama' => $petugas_nama,
			'petugas_no_hp' => $petugas_no_hp,
			'petugas_email' => $petugas_email
		];

		//Cek Validasi Data Petugas, Jika Data Tidak Valid 
		if ($this->form_validation->run($data, 'user') == FALSE) {

			$validasi = [
				'error'   => true,
				'username_error' => $this->form_validation->getErrors('username')
			];
			echo json_encode($validasi);
		}

		//Data Valid
		else {
			//Simpan Data Petugas
			$this->M_petugas->save($data);

			$validasi = [
				'success'   => true
			];
			echo json_encode($validasi);
		}
	}

	// Menampilkan Data Petugas Pada Modal Edit Data Petugas
	public function ajaxUpdate($idPetugas)
	{
		$data = $this->M_petugas->find($idPetugas);
		echo json_encode($data);
	}

	// Update Data Petugas
	public function update()
	{
		$id = $this->request->getPost('idPetugas');
		$username = $this->request->getPost('username2');
		$petugas_nama = $this->request->getPost('petugas_nama2');
		$petugas_no_hp = $this->request->getPost('petugas_no_hp2');
		$petugas_email = $this->request->getPost('petugas_email2');

		//Data Petugas
		$data = [
			'username' => $username,
			'petugas_nama' => $petugas_nama,
			'petugas_no_hp' => $petugas_no_hp,
			'petugas_email' => $petugas_email
		];

		//Cek Validasi Data Petugas, Jika Data Tidak Valid 
		if ($this->form_validation->run($data, 'user') == FALSE) {

			$validasi = [
				'error'   => true,
				'username_error' => $this->form_validation->getErrors('username')
			];
			echo json_encode($validasi);
		}

		//Data Valid
		else {
			//Update Data Petugas
			$this->M_petugas->update($id, $data);

			$validasi = [
				'success'   => true
			];
			echo json_encode($validasi);
		}
	}

	// Delete Data Petugas
	public function delete($id)
	{
		$this->M_petugas->delete($id);
	}

	// Datatable server side
	public function ajaxDataPetugas()
	{

		if ($this->request->getMethod(true) == 'POST') {
			$lists = $this->M_petugas->get_datatables();
			$data = [];
			$no = $this->request->getPost("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				$row[] = $list->username;
				$row[] = $list->petugas_nama;
				$row[] = $list->petugas_no_hp;
				$row[] = $list->petugas_email;
				$row[] = $this->_action($list->id);
				$data[] = $row;
			}
			$output = [
				"draw"                 => $this->request->getPost('draw'),
				"recordsTotal"         => $this->M_petugas->count_all(),
				"recordsFiltered"     => $this->M_petugas->count_filtered(),
				"data"                 => $data
			];
			echo json_encode($output);
		}
	}
}

/* End of file DataPetugas.php */
/* Location: .//C/xampp/htdocs/app-pmb/app/Controllers/DataPetugas.php */
