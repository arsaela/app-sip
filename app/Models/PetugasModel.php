<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class PetugasModel extends Model
{
	protected $table = "tbl_petugas";
	protected $allowedFields = ['username', 'petugas_nama', 'petugas_no_hp', 'petugas_email'];
	protected $column_order = [null, 'username', 'petugas_nama', 'petugas_no_hp', 'petugas_email', null];
	protected $column_search = ['username', 'petugas_nama', 'petugas_no_hp', 'petugas_email'];
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

	public function get_petugas()
	{
		$query =  $this->db->table('tbl_petugas')
			->select('*')
			->join('tbl_login', 'tbl_login.username = tbl_petugas.username')
			->join('tbl_instansi', 'tbl_instansi.instansi_id = tbl_petugas.instansi_id')
			->groupBy('tbl_petugas.id')
			->get();
		return $query;
	}
	private function _get_datatables_query()
	{
		$i = 0;
		foreach ($this->column_search as $item) {
			if ($this->request->getPost('search')['value']) {
				if ($i === 0) {
					$this->dt->groupStart();
					$this->dt->like($item, $this->request->getPost('search')['value']);
				} else {
					$this->dt->orLike($item, $this->request->getPost('search')['value']);
				}
				if (count($this->column_search) - 1 == $i)
					$this->dt->groupEnd();
			}
			$i++;
		}

		if ($this->request->getPost('order')) {
			$this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->dt->orderBy(key($order), $order[key($order)]);
		}
	}

	public function save_petugas_in_petugas($data)
	{
		$builder = $this->db->table('tbl_petugas');
		return $builder->insert($data);
	}

	public function save_petugas_in_login($data2)
	{
		$builder2 = $this->db->table('tbl_login');
		return $builder2->insert($data2);
	}

	function get_instansi()
	{
		$query = $this->db->query('select * from tbl_instansi');
		return $query->getResult();
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($this->request->getPost('length') != -1)
			$this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
		$query = $this->dt->get();
		return $query->getResult();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		return $this->dt->countAllResults();
	}

	public function count_all()
	{
		$tbl_storage = $this->db->table($this->table);
		return $tbl_storage->countAllResults();
	}
}

/* End of file PetugasModel.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Models/PetugasModel.php */