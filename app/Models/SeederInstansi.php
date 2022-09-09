<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class SeederInstansi extends Model
{
	protected $table = "tbl_petugas";
	protected $allowedFields = ['username', 'petugas_nama', 'petugas_no_hp', 'petugas_email', 'instansi_id'];
	protected $column_order = [null, 'username', 'petugas_nama', 'petugas_no_hp', 'petugas_email', 'instansi_id', null];
	protected $column_search = ['username', 'petugas_nama', 'petugas_no_hp', 'petugas_email', 'instansi_id'];
	protected $order = ['id' => 'desc'];
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

	public function get_instansi_name()
	{
		$query =  $this->db->table('tbl_instansi')
			->get();
		return $query;
	}

	public function get_instansi_id()
	{
		$query =  $this->db->table('tbl_instansi')
			->select('tbl_instansi.instansi_id')
			->get();
		return $query;
	}


	
}

/* End of file petugasModel.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Models/petugasModel.php */