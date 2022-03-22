<?php namespace App\Controllers;

use App\Models\InstansiModel;
use App\Models\FormasiModel;
use Config\Services;

class DataFormasi extends BaseController 
{
	protected $M_instansi;
	protected $M_formasi;
	protected $request;
	protected $form_validation;
	protected $session;

	public function __construct()
	{
		$this->request = Services::request();
	  	$this->M_instansi = new InstansiModel($this->request);
	  	$this->M_formasi = new FormasiModel($this->request);
		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
	}

		// Tombol Aksi Pada Tabel Data Prodi
		private function _action2($idFormasi)
		{ 
			$link = "
				<a data-toggle='tooltip' data-placement='top' class='btn-detilPNS' title='Detail' value='".$idFormasi."'>
					  <button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'><i class='btn btn-primary'></i></button>
				  </a>
		  
			";
			return $link;
		}

	// Tombol Aksi Pada Tabel Data Prodi
	private function _action($idFormasi)
	{ 
		$link = "
			<a data-toggle='tooltip' data-placement='top' class='btn-editProdi' title='Update' value='".$idFormasi."'>
	      		<button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'><i class='fa fa-edit'></i></button>
	      	</a>
	      
	      	<a href='".base_url('dataformasi/delete/'.$idFormasi)."' class='btn-deleteProdi' data-toggle='tooltip' data-placement='top' title='Delete'>
	      		<button type='button' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash'></i></button>
	      	</a>
            
	    ";
	    return $link;
	}

	// Halaman Data Prodi
	public function view($idInstansi)
	{
		$data ['title']  = "App-PMB | Data Formasi";
		$data ['page']   = "dataformasi";
		$data ['nama']   = $this->session->get('nama');
		$data ['email']   = $this->session->get('email');


		return view('v_dataFormasi/view', $data);
		
	}


	// Datatable server side
	public function ajaxDataFormasi($idInstansi)
	{
	  
	  if($this->request->getMethod(true)=='POST')
	  {
	    $lists = $this->M_formasi->get_datatables($idInstansi);
	        $data = [];
	        $no = $this->request->getPost("start");
	        foreach ($lists as $list) 
	        {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->jabatan_nama;
                $row[] = $list->instansi_unor_nama;
                $row[] = $list->formasi_jumlah;
				$row[] = $list->jumlahasn;
				$row[] = $list->pegawai_nama;
                $row[] = $this->_action($list->instansi_id);
                $data[] = $row;
	    	}
	    $output = [
	    	"draw" 				=> $this->request->getPost('draw'),
	        "recordsTotal" 		=> $this->M_formasi->count_all($idInstansi),
            "recordsFiltered" 	=> $this->M_formasi->count_filtered($idInstansi),
            "data" 				=> $data
        	];
	    echo json_encode($output);
	  }
	}

}

/* End of file DataProdi.php */
/* Location: .//C/xampp/htdocs/app-pmb/app/Controllers/DataProdi.php */
