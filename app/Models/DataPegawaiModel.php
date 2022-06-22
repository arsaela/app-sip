<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class DataPegawaiModel extends Model
{
	protected $table = "tbl_pegawai";
	protected $allowedFields = ['instansi_id', 'instansi_uker', 'instansi_nama', 'jabatan_kode', 'formasi_jumlah'];
	protected $column_order = [null, 'instansi_id', 'instansi_uker', 'instansi_nama', 'jabatan_kode', 'formasi_jumlah', null];
	protected $column_search = ['instansi_id', 'instansi_uker', 'jabatan_kode', 'formasi_jumlah'];
	protected $order = ['formasi_id' => 'asc'];
	protected $request;
	protected $db;
	protected $dt;

	function __construct(RequestInterface $request)
	{
		parent::__construct();
		$this->db = db_connect();
		$this->request = $request;
		$this->dt = $this->db->table($this->table);
	}

	public function getInstansiByLogin($username) {
		$query =  $this->db->table('tbl_login')
		->select('tbl_petugas.instansi_id')
		->join('tbl_petugas', 'tbl_petugas.username = tbl_login.username')
		->where('tbl_login.username', $username)
		->get();
		return $query;
	}



	public function getnamaInstansi($getIDInstansi) {
		$query =  $this->db->table('tbl_instansi')
		->where('tbl_instansi.instansi_id', $getIDInstansi)
		->get();
		return $query;
	}

	public function getPegawaiByInstansiID()
	{
		$query =  $this->db->table('tbl_pegawai')
		->select('pegawai_nama, tbl_instansi.instansi_nama, tbl_instansi.instansi_id, pegawai_nip, jabatan_nama, pegawai_gol, gol_nama, gol_pangkat, status_nama')
		->join('tbl_instansi', 'tbl_instansi.instansi_id = tbl_pegawai.instansi_id')
		->join('tbl_jabatan', 'tbl_jabatan.jabatan_kode = tbl_pegawai.jabatan_kode', 'left')
		->join('tbl_golongan', 'tbl_golongan.gol_id = tbl_pegawai.pegawai_gol', 'left')
		->join('tbl_status', 'tbl_status.status_id = tbl_pegawai.pegawai_status', 'left')
		// ->where('tbl_pegawai.instansi_id', $getIDInstansi)
		->orderBy('tbl_pegawai.instansi_id ASC')
		->get();
		return $query;
	}	

	// public function getDetailPegawai($idUnor, $idJabatan)
	// {
	// 	$query =  $this->db->table('tbl_formasi')
	// 	->select('tbl_formasi.instansi_id,tbl_formasi.instansi_unor,tbl_formasi.jabatan_kode,formasi_jumlah,tbl_jabatan.jabatan_nama,tbl_unor.instansi_unor_nama,tbl_pegawai.pegawai_nama,tbl_pegawai.pegawai_nip')
	// 	->where('tbl_formasi.instansi_unor', $idUnor)
	// 	->join('tbl_jabatan', 'tbl_formasi.jabatan_kode = tbl_jabatan.jabatan_kode', 'left')
	// 	->join('tbl_unor', 'tbl_unor.instansi_unor = tbl_formasi.instansi_unor', 'left')
	// 	->join('tbl_pegawai', 'tbl_formasi.jabatan_kode = tbl_pegawai.jabatan_kode', 'left')
	// 	->where('tbl_pegawai.jabatan_kode', $idJabatan)
	// 	->where('tbl_pegawai.instansi_unor', $idUnor)
	// 	->get();
	// 	return $query;
	// }
}

/* End of file FormasiModel.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Models/FormasiModel.php */