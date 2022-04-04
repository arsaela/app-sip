<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "tbl_login";
    // protected $allowedFields = ['login_id', 'username', 'password', 'hak_akses'];
    protected $useTimestamps = true;
    protected $request;
	protected $db;
	protected $dt;




	public function getUserByUsername($username) {
		$query =  $this->db->table('tbl_login')
			->select('*')
			->join('tbl_petugas', 'tbl_petugas.username = tbl_login.username')
			->where('tbl_login.username', $username)
			->get();
		return $query;
	}
}

/* End of file UserModel.php */
/* Location: .//C/xampp/htdocs/app-pmb/app/Models/UserModel.php */
