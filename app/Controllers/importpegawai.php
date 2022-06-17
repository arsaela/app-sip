<?php namespace App\Controllers;

use App\Models\importDataModel;
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
        $this->importDataModel = new importDataModel();
    }

    public function index(){ 
        $data = array(
            'title' => 'App-SIP | Import Data',
            'page' => 'import Data',
            'nama' => $this->session->get('nama'),
            'email' => $this->session->get('email'),
            'pegawai' => $this->importDataModel->alldata(),
        );

        return view('v_import_data/index', $data);
    }

    public function import(){
      
        $file=$this->request->getFile('file_excel');
        new PHPExcel;
        $filelocation = $file->getTempName();
        $objPHPExcel = PHPExcel_IOFactory::load($filelocation);
        $sheet = $objPHPExcel->getActiveSheet()->toArray(true,true,true,true,true,true,true,true);

        foreach($sheet as $key => $data){
            if($key == 1){
                continue;
            }
            $pegawai_nip = $this->importDataModel->cek_data($data['G']);
            if ($data['G'] == $pegawai_nip['pegawai_nip']){
                continue;
            }

            $data = array(
                'pegawai_nama' => $data['B'],
                'pegawai_status' => $data['C'],
                'instansi_id' => $data['D'],
                'instansi_unor' => $data['E'],
                'jabatan_kode' => $data['F'],
                'pegawai_nip' => $data['G'],
                'pegawai_gol' => $data['H'],
            );
            $this->importDataModel->add($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Import');
        return redirect()->to('SetBatasUsulan/index');
    }

    public function submitImport(){
		$this->load->library(array('excel','session'));
		$filename = $_FILES["fileExcel"]["name"]; // get name include path, file upload
		$file_ext = pathinfo($filename,PATHINFO_EXTENSION); // get type file upload

		if($file_ext=="xlsx" OR $file_ext=="xls" OR $file_ext=="csv"){
			if (isset($_FILES["fileExcel"]["name"])) {
				$path = $_FILES["fileExcel"]["tmp_name"];
				$object = PHPExcel_IOFactory::load($path);
				foreach($object->getWorksheetIterator() as $worksheet){
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();	

					/*START MENCOCOKKAN ISI TABEL DENGAN MENGAMBIL ROW EXCEL YANG PERTAMA (MEMUAT JUDUL) MAKA getCellByColumnAndRow(.., 1)*/
					$check_row_name_pegawai_nama = $worksheet->getCellByColumnAndRow(0, 1)->getValue(); /*krn yang di ambil adalah baris pertama maka di isi 1 semua*/
					$check_row_name_pegawai_status = $worksheet->getCellByColumnAndRow(1, 1)->getValue();
					$check_row_name_instansi_id = $worksheet->getCellByColumnAndRow(2, 1)->getValue();
					$check_row_name_instansi_unor = $worksheet->getCellByColumnAndRow(3, 1)->getValue();
					$check_row_name_jabatan_kode = $worksheet->getCellByColumnAndRow(4, 1)->getValue();
					$check_row_name_pegawai_nip = $worksheet->getCellByColumnAndRow(5, 1)->getValue();
					$check_row_name_pegawai_gol = $worksheet->getCellByColumnAndRow(6, 1)->getValue();

					// echo $check_row_name_pegawai_nama;
					// echo "<br>";

					/* KEMUDIAN MENCOCOKKAN NAMA FIELD DI EXCEL DAN DI PHPMYADMIN JIKA COCOK MAKA DI PROSES, SETELAH == SESUAIKAN PERSIS DENGAN NAMA FIELD DI DB*/
					if($check_row_name_pegawai_nama=="pegawai_nama" 
                    AND $check_row_name_pegawai_status=="pegawai_status" 
                    AND $check_row_name_instansi_id=="instansi_id" 
                    AND $check_row_name_instansi_unor=="instansi_unor" 
                    AND $check_row_name_jabatan_kode=="jabatan_kode" 
                    AND $check_row_name_pegawai_nip=="pegawai_nip" 
                    AND $check_row_name_pegawai_gol=="pegawai_gol" 
                    ){

						/*jika data match maka akan di proses dan lanjut looping mengambil data row kedua untuk isi data excelnya*/
						//echo "DATA COCOK";

						for($row=2; $row<=$highestRow; $row++){ /* mulai dari baris nomer 2 di excel (berisi data)*/

							/*KUNCINYA SAMAKAN PERSIS NAMA ROW DI EXCEL,KODING DAN DI PHPMYADMIN*/
							$pegawai_nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue(); /* krn nama terletak di kolom ke 2, di mulai dari 0 */
							$pegawai_status = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
							$instansi_id = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
							$instansi_unor = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
							$jabatan_kode = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
							$pegawai_nip = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
							$pegawai_gol = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
							// $alamat = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
							// $jabatan = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
							// $unit_kerja = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
							// $pend_terakhir = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
							// $gelar_depan = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
							// $gelar_belakang = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
							// $tahun_formasi_daftar = $worksheet->getCellByColumnAndRow(13, $row)->getValue();

							$temp_data[] = array(
								'pegawai_nama'	=> $pegawai_nama,
								'pegawai_status'	=> $pegawai_status,
								'instansi_id'	=> $instansi_id,
								'instansi_unor'	=> $instansi_unor,
								'jabatan_kode'	=> $jabatan_kode,
								'pegawai_nip'	=> $pegawai_nip,
								'pegawai_gol'	=> $pegawai_gol,
								); 	
						}

						$insert = $this->m_admin->import_data_pelamar_excel($temp_data);

						if($insert){
							$this->session->setFlashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
							redirect(site_url('admin/pelamar'));
							/*redirect($_SERVER['HTTP_REFERER']);*/
						} else {
							$this->session->setFlashdata('status_duplicate_upload', '<strong> Maaf, Data gagal di tambahkan. Karena sudah pernah di tambahkan/sudah ada di database.</strong>');
							redirect($_SERVER['HTTP_REFERER']);
						}

					} else {
						//echo "DATA TABEL DAN PHPMYADMIN TIDAK COCOK";
						$this->session->setFlashdata('status_gagal_upload', '<span class="glyphicon glyphicon-remove"></span> Data Field Name Excel dan database tidak sesuai. Mohon sesuaikan dulu');
						redirect($_SERVER['HTTP_REFERER']);
					}
					/*END MENCOCOKKAN ISI TABEL DENGAN MENGAMBIL ROW EXCEL YANG PERTAMA (MEMUAT JUDUL)*/
				}// end foreach
			}
		} else {
			$this->session->setFlashdata('status_gagal_upload', '<strong> Maaf, sistem tidak mendukung format '.$file_ext.'. Khusus format excel .xls, .xlsx </strong>');
			redirect($_SERVER['HTTP_REFERER']);
		}

	}
}