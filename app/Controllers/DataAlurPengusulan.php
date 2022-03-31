<?php

namespace App\Controllers;

use App\Models\AlurPengusulanModel;
use Config\Services;

class DataAlurPengusulan extends BaseController
{
	protected $M_alur_pengusulan;
	protected $request;
	protected $form_validation;
	protected $session;

	public function __construct()
	{
		$this->request = Services::request();
		$this->M_alur_pengusulan = new AlurPengusulanModel($this->request);
		$this->form_validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$session = \Config\Services::session();
	}

	// Halaman Data Alur Pengusulan
	public function index()
	{
		$data['title']     = 'Data Alur Pengusulan';
		$data['page']      = "dataalurpengusulan";
		$data['nama']      = $this->session->get('nama');
		$data['email']     = $this->session->get('email');

		$data['getAlurPengusulan'] = $this->M_alur_pengusulan->getAlurPengusulan()->getResult();

		return view('v_dataAlurPengusulan/index', $data);
	}

	public function add_alur_pengusulan()
    {
        $data['title']     = 'Tambah Data Alur Pengusulan';

		
		$data = array(
            'nama_barang' => $this->request->getPost('nama'),
            'qty'         => $this->request->getPost('qty'),
            'harga_beli'  => $this->request->getPost('beli'),
            'harga_jual'  => $this->request->getPost('jual')
        );
       
		$Save_Alur_Pengusulan = $this->M_alur_pengusulan->save_alur_pengusulan($data);

		if(isset($Save_Alur_Pengusulan)) {
			$data['message_success'] = "Data Alur Pengusulan berhasil di update";

			$data['title']     = 'Data Alur Pengusulan';
			$data['page']      = "dataalurpengusulan";
			$data['nama']      = $this->session->get('nama');
			$data['email']     = $this->session->get('email');

			$data['getAlurPengusulan'] = $this->M_alur_pengusulan->getAlurPengusulan()->getResult();

			return view('v_dataAlurPengusulan/index', $data);
		} else{
			$data['message_failed'] = "Data Alur Pengusulan gagal di update. Silahkan cek dan coba kembali !";

			return view('v_dataAlurPengusulan/update', $data);
		}
		
        return view('v_dataAlurPengusulan/add', $data);
    }

    public function add()
    {
        $model = new Barang_model;
        $data = array(
            'nama_barang' => $this->request->getPost('nama'),
            'qty'         => $this->request->getPost('qty'),
            'harga_beli'  => $this->request->getPost('beli'),
            'harga_jual'  => $this->request->getPost('jual')
        );
        $model->saveBarang($data);
        echo '<script>
                alert("Sukses Tambah Data Barang");
                window.location="'.base_url('barang').'"
            </script>';

    }

	public function update_informasi($id)
    {
        $getInformasiByID = $this->M_informasi->get_informasi_by_id($id)->getRow();
        if(isset($getInformasiByID))
        {
          	  $data['informasi_by_id'] = $getInformasiByID;
			
			  $data['title']     = 'Update Data Informasi';
			  $data['page']   	 = "updateDataInformasi";
			  $data['nama']   = $this->session->get('nama');
			  $data['email']   = $this->session->get('email');

			  return view('v_dataInformasi/update', $data);

        }else{

            echo '<script>
                    alert("Data Informasi ='.$id.' Tidak ditemukan");
                    window.location="'.base_url('datainformasi').'"
                </script>';
        }
    }

	public function save_update()
    {
        $id = $this->request->getPost('informasi_id');
        $data = array(
            'informasi_judul' => $this->request->getPost('informasi_judul'),
            'informasi_content' => $this->request->getPost('informasi_content')
        );
		
        $updatedatasuccess = $this->M_informasi->updateInformasi($data,$id);
		if(isset($updatedatasuccess)){
			$data['message_success'] = "Data Informasi berhasil di update";

			$data['title']     = 'Data Informasi';
			$data['page']   = "datainformasi";
			$data['nama']   = $this->session->get('nama');
			$data['email']   = $this->session->get('email');

			$data['getInformasi'] = $this->M_informasi->getInformasi()->getResult();

			return view('v_dataInformasi/index', $data);
		} else{
			$data['message_failed'] = "Data Informasi gagal di update. Silahkan cek dan coba kembali !";

			return view('v_dataInformasi/update', $data);
		}
		
	
	}
}