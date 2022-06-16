<?php

namespace App\Models;


use CodeIgniter\Model;

class importDataModel extends Model
{
	public function alldata(){
        return $this->db->table('tbl_pegawai')->get()->getResultArray();
    }

    
}

/* End of file PetugasModel.php */
/* Location: .//C/xampp/htdocs/app-sip/app/Models/PetugasModel.php */




