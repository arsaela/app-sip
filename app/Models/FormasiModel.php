<?php namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class FormasiModel extends Model  
{
	protected $table = "tbl_formasi";
	protected $allowedFields = ['instansi_id','instansi_uker','jabatan_kode','formasi_jumlah'];
	protected $column_order = [null, 'instansi_id','instansi_uker','jabatan_kode','formasi_jumlah', null];
	protected $column_search = ['instansi_id','instansi_uker','jabatan_kode','formasi_jumlah'];
	protected $order = ['id' => 'desc'];
	protected $request;
	protected $db;
	protected $dt;

	function __construct(RequestInterface $request){
	   parent::__construct();
	   $this->db = db_connect();
	   $this->request = $request;
	   #$this->dt = $this->db->table($this->table)->select('*');
       $this->dt = $this->db->table($this->table)->select('tbl_formasi.id, tbl_formasi.instansi_id,tbl_formasi.instansi_uker,tbl_formasi.jabatan_kode,formasi_jumlah,tbl_jabatan.jabatan_nama,tbl_unor.instansi_unor_nama,tbl_pegawai.pegawai_nama, count(tbl_pegawai.pegawai_nama) as jumlahasn')->join('tbl_jabatan', 'tbl_jabatan.jabatan_kode = tbl_formasi.jabatan_kode', 'left')->join('tbl_unor', 'tbl_unor.instansi_unor = tbl_formasi.instansi_uker')->join('tbl_pegawai', 'tbl_pegawai.jabatan_kode = tbl_formasi.jabatan_kode')->groupBy('tbl_pegawai.jabatan_kode,tbl_pegawai.instansi_uker')->where('tbl_pegawai.instansi_uker = tbl_formasi.instansi_uker');
	}

	private function _tbl_formasi($idInstansi){
		$this->dt->where('tbl_formasi.instansi_id', $idInstansi);
	}

	private function _get_datatables_query($idInstansi){
		$this->_tbl_formasi($idInstansi);
	    $i = 0;
	    foreach ($this->column_search as $item){
	        if($this->request->getPost('search')['value']){ 
	            if($i===0){
	                $this->dt->groupStart();
	                $this->dt->like($item, $this->request->getPost('search')['value']);
	            }
	            else{
	                $this->dt->orLike($item, $this->request->getPost('search')['value']);
	            }
	            if(count($this->column_search) - 1 == $i)
	                $this->dt->groupEnd();
	        }
	        $i++;
	    }
	     
	    if($this->request->getPost('order')){
	            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
	        } 
	    else if(isset($this->order)){
	        $order = $this->order;
	        $this->dt->orderBy(key($order), $order[key($order)]);
	    }
	}

	function get_datatables($idInstansi){
	    $this->_get_datatables_query($idInstansi);
	    if($this->request->getPost('length') != -1)
	    $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
	    $query = $this->dt->get();
	    return $query->getResult();
	}

	function count_filtered($idInstansi){
	    $this->_get_datatables_query($idInstansi);
	    return $this->dt->countAllResults();
	}

	public function count_all($idInstansi){
	    $tbl_storage = $this->db->table($this->table)->select('*')->where('tbl_formasi.instansi_id', $idInstansi);
	    return $tbl_storage->countAllResults();
	}
}

/* End of file ProdiModel.php */
/* Location: .//C/xampp/htdocs/app-pmb/app/Models/ProdiModel.php */