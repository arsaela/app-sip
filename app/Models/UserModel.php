<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "tbl_login";
    protected $allowedFields = ['login_id', 'username', 'password', 'hak_akses'];
    protected $useTimestamps = true;
}

/* End of file UserModel.php */
/* Location: .//C/xampp/htdocs/app-pmb/app/Models/UserModel.php */
