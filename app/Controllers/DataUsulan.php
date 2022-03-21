<?php

namespace App\Controllers;

use App\Models\UsulanModel;
use Config\Services;

class DataUsulan extends BaseController
{
	protected $M_usulan;
	protected $request;
	protected $form_validation;
	protected $session;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_usulan = new UsulanModel($this->request);
		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
	}

	// Halaman Data usulan
	public function index()
	{
        $data['title']     = 'Data Usulan';
		$data['page']   = "datausulan";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');
		
		$yearnow = date('Y');
		$data['getUsulan'] = $this->M_usulan->getUsulan($yearnow)->getResult();

		return view('v_dataUsulan/index', $data);
	}

	public function detail_usulan($id)
    {
		$data['page']   = "Detail_data_usulan";
		$data['nama']   = $this->session->get('nama');
		$data['email']   = $this->session->get('email');

        $getDetailUsulan = $this->M_usulan->getDetailUsulanByID($id)->getResult();
		//$getJabatanKodeByDetailUsulan = $this->M_usulan->getJabatanKodeByDetailUsulan($id)->getResult();
		// $getInstansiKodeByUsulan = $this->M_usulan->getInstansiKodeByUsulan($id)->getResult();


		// $getJumlahKebutuhanFormasi = $this->M_usulan->getJumlahKebutuhanFormasi($getJabatanKodeByDetailUsulan, $getInstansiKodeByUsulan)->getResult();
		//echo "<pre>";
		//print_r($getJabatanKodeByDetailUsulan);
		//echo "<br>";
		//die("STTTOPPPP");

        if(isset($getDetailUsulan))
        {
            $data['detail_usulan_by_id'] = $getDetailUsulan;
			$data['get_usulan_by_id'] = $this->M_usulan->getUsulanByID($id)->getRow();
			// dd($data[''usulan_by_id'']);
			return view('v_dataUsulan/detail_data_usulan', $data);

        }else{

            echo '<script>
                    alert("Kode Usulan = '.$id.' Tidak ditemukan");
                    window.location="'.base_url('detail_usulan_by_id').'"
                </script>';
        }
    }

	// public function approval_usulan($id)
    // {
	// 	$data = array(
	// 		'status_usulan' => '1'
	// 	);

	// 	$getApproveUsulan = $this->M_usulan->getApproveUsulan($data, $id);
    //     if(isset($getApproveUsulan))
    //     {
	// 		return view('v_dataUsulan/detail_data_usulan', $data);
    //     }else{

    //         echo '<script>
    //                 alert("ID barang '.$id.' Tidak ditemukan");
    //                 window.location="'.base_url('barang').'"
    //             </script>';
    //     }
	// }


	public function approval_usulan_by_id($id)
    {
        $id = $this->request->getPost('detail_usulan_id');
        $data = array(
            'jumlah_approve'        => $this->request->getPost('jumlah_approve'),
            'status_usulan'      	=> '1',
			'keterangan'      		=> '-',
        );

        $this->M_usulan->updateApprovalUsulan($data, $id);

		$dataredirect['page']   = "Detail_data_usulan";
		$dataredirect['nama']   = $this->session->get('nama');
		$dataredirect['email']   = $this->session->get('email');

		// print_r($id);
		// die('STPPPPP');
		return redirect()->back();
    }


	public function reject_usulan_by_id($id)
    {
        $id = $this->request->getPost('detail_usulan_id');
        $data = array(
			'jumlah_approve'    => '0',
            'keterangan'        => $this->request->getPost('keterangan'),
            'status_usulan'     => '2',
        );

        $this->M_usulan->updateRejectUsulan($data, $id);

		$dataredirect['page']   = "Detail_data_usulan";
		$dataredirect['nama']   = $this->session->get('nama');
		$dataredirect['email']   = $this->session->get('email');

		// print_r($id);
		// die('STPPPPP');
		return redirect()->back();
    }

}
