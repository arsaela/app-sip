<?php namespace App\Controllers;

use App\Models\ImportDataModel;
use PHPExcel;
use PHPExcel_IOFactory;

class ImportPegawai extends BaseController
{
    protected $session;
    protected $ImportPegawai;

    public function __construct()
    {
        helper('form');
        $this->session = \Config\Services::session();
        $this->ImportDataModel = new ImportDataModel();
    }

    public function index(){ 
        $data = array(
            'title' => 'App-SIP | Import Data',
            'page' => 'import Data',
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'pegawai' => $this->ImportDataModel->findAll(),
        );

        return view('v_import_data/index', $data);
    }

    public function import(){
      
        $file=$this->request->getFile('fileExcel');
        $excelReader  = new PHPExcel();
        $filelocation = $file->getTempName();
        $objPHPExcel = PHPExcel_IOFactory::load($filelocation);
        $sheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true);

        foreach($sheet as $key => $data){
            if($key == 1){
                continue;
            }
            $pegawai_nip = $this->ImportDataModel->cek_data($data['F']);
            if ($data['F'] == $pegawai_nip['pegawai_nip']){
                continue;
            }

            $data = array(
                'pegawai_nama' => $data['A'],
                'pegawai_status' => $data['B'],
                'instansi_id' => $data['C'],
                'instansi_unor' => $data['D'],
                'jabatan_kode' => $data['E'],
                'pegawai_nip' => $data['F'],
                'pegawai_gol' => $data['G'],
            );
            $this->ImportDataModel->add($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Import');
        return redirect()->to('importpegawai');
    }

    public function submitImport(){
		
		$file = $this->request->getFile('fileexcel');
		if($file){
			new PHPExcel();
			//mengambil lokasi temp file
			$fileLocation = $file->getTempName();
			//baca file
			$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
			//ambil sheet active
			$sheet	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true);
			//looping untuk mengambil data
			foreach ($sheet as $idx => $data) {
				//skip index 1 karena title excel
				if($idx==1){
					continue;
				}
				$pegawai_nama = $data['A'];
				$pegawai_status = $data['B'];
				$instansi_id = $data['C'];
				$instansi_unor = $data['D'];
				$jabatan_kode = $data['E'];
				$pegawai_nip = $data['F'];
				$pegawai_gol = $data['G'];
				// insert data
				$this->ImportDataModel->insert([
					'pegawai_nama'=>$pegawai_nama,
					'pegawai_status'=>$pegawai_status,
					'instansi_id'=>$instansi_id,
					'instansi_unor'=>$instansi_unor,
					'jabatan_kode'=>$jabatan_kode,
					'pegawai_nip'=>$pegawai_nip,
					'pegawai_gol'=>$pegawai_gol
				]);
			}
		}
		session()->setFlashdata('message','Berhasil import excel');
		return redirect()->to('importpegawai');
	
	}

	
	
}
