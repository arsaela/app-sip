<?php namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class AlurPengusulanModel extends Model  
{

	protected $table = "tbl_alur_pengusulan";
	// protected $allowedFields = ['tgl_buka', 'tgl_tutup', 'tgl_pengumuman'];
	// protected $column_order = [null, 'tgl_buka', 'tgl_tutup', 'tgl_pengumuman', null];
	// protected $column_search = ['tgl_buka', 'tgl_tutup', 'tgl_pengumuman'];
	protected $order = ['alur_pengusulan_id' => 'desc'];
	protected $request;
	protected $db;
	protected $dt;

	function __construct(RequestInterface $request){
	   parent::__construct();
	   $this->db = db_connect();
	   $this->request = $request;
	   $this->dt = $this->db->table($this->table);
	}

	public function getAlurPengusulan()
	{
		$query =  $this->db->table('tbl_alur_pengusulan')
			->select('*')
			->get();
		return $query;
	}

	public function save_alur_pengusulan($data)
    {
        $builder = $this->db->table('tbl_alur_pengusulan');
        return $builder->insert($data);
    }

	public function get_informasi_by_id($id)
    {
        $query =  $this->db->table('tbl_informasi')
			->select('*')
			->where('tbl_informasi.informasi_id', $id)
			->get();
		return $query;
    }

	public function updateInformasi($data,$id)
    {
        $builder =  $this->db->table('tbl_informasi');
        $builder->where('informasi_id', $id);
        return $builder->update($data);
    }


}

/* End of file InformasiModel.php */
/* Location: .//C/xampp/htdocs/app-pmb/app/Models/InformasiModel.php */