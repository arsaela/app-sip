<?php

namespace App\Models;


use CodeIgniter\Model;

class importDataModel extends Model
{
	public function alldata(){
        return $this->db->table('tbl_pegawai')->get()->getResultArray();
    }

    public function cek_data($pegawai_nip){
        return $this->db->table('tbl_pegawai')
        ->where('pegawai_nip', '$pegawai_nip')
        ->get()->getRowArray();
    }
    
    public function add($data){
        $this->db->table('tbl_pegawai')->insert($data);
    }

	public function import_data_pelamar_excel($data){
		$insert = $this->db->insert_batch('pelamar_list', $data);
		return $insert;
		// if($insert){
		// 	return true;
		// } else {
		// 	echo "gagal";
		// 	die('data gagal stoppp');
		// }
	}


}

/* End of file PetugasModel.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Models/PetugasModel.php */




