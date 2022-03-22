<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class FormasiModel extends Model
{
	protected $table = "tbl_formasi";
	protected $allowedFields = ['instansi_id', 'instansi_uker', 'jabatan_kode', 'formasi_jumlah'];
	protected $column_order = [null, 'instansi_id', 'instansi_uker', 'jabatan_kode', 'formasi_jumlah', null];
	protected $column_search = ['instansi_id', 'instansi_uker', 'jabatan_kode', 'formasi_jumlah'];
	protected $order = ['formasi_id' => 'desc'];
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

	public function getDetailFormasi($idInstansi)
	{
		$query =  $this->db->table('tbl_formasi')
			->select('tbl_formasi.instansi_id,tbl_formasi.instansi_unor,tbl_formasi.jabatan_kode,formasi_jumlah,tbl_jabatan.jabatan_nama,tbl_unor.instansi_unor_nama,tbl_pegawai.pegawai_nama, count(tbl_pegawai.pegawai_nama) as jumlahasn')
			->where('tbl_formasi.instansi_id', $idInstansi)
			->join('tbl_jabatan', 'tbl_formasi.jabatan_kode = tbl_jabatan.jabatan_kode', 'left')
			->join('tbl_unor', 'tbl_unor.instansi_unor = tbl_formasi.instansi_unor')
			->join('tbl_pegawai', 'tbl_formasi.jabatan_kode = tbl_pegawai.jabatan_kode')
			->groupBy('tbl_pegawai.jabatan_kode', 'tbl_pegawai.instansi_unor')
			->where('tbl_pegawai.instansi_unor = tbl_formasi.instansi_unor')
			// ->join('tbl_instansi', 'tbl_formasi.instansi_id = tbl_instansi.instansi_id')
			// ->groupBy('tbl_pegawai.jabatan_kode', 'tbl_pegawai.instansi_unor')
			// 
			// 
			// ->where('tbl_formasi.instansi_id', $idInstansi)
			->get();
		return $query;
	}

	public function getDetailPegawai($idInstansi)
	{
		$query =  $this->db->table('tbl_formasi')
			->select('tbl_formasi.instansi_id,tbl_formasi.instansi_unor,tbl_formasi.jabatan_kode,formasi_jumlah,tbl_jabatan.jabatan_nama,tbl_unor.instansi_unor_nama,tbl_pegawai.pegawai_nama, count(tbl_pegawai.pegawai_nama) as jumlahasn')
			->where('tbl_formasi.instansi_id', $idInstansi)
			->join('tbl_jabatan', 'tbl_formasi.jabatan_kode = tbl_jabatan.jabatan_kode', 'left')
			->join('tbl_unor', 'tbl_unor.instansi_unor = tbl_formasi.instansi_unor')
			->join('tbl_pegawai', 'tbl_formasi.jabatan_kode = tbl_pegawai.jabatan_kode')
			->where('tbl_pegawai.instansi_unor = tbl_formasi.instansi_unor')
			// ->join('tbl_instansi', 'tbl_formasi.instansi_id = tbl_instansi.instansi_id')
			// ->groupBy('tbl_pegawai.jabatan_kode', 'tbl_pegawai.instansi_unor')
			// 
			// 
			// ->where('tbl_formasi.instansi_id', $idInstansi)
			->get();
		return $query;
	}
}

/* End of file ProdiModel.php */
/* Location: .//C/xampp/htdocs/app-pmb/app/Models/ProdiModel.php */