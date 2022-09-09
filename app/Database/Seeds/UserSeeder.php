<?php namespace App\Database\Seeds;
use App\Models\SeederInstansi;
use Config\Services;

class UserSeeder extends \CodeIgniter\Database\Seeder
{

    public function __construct()
    {

        $this->db = db_connect();
        $this->encrypter = \Config\Services::encrypter();
        $this->request = Services::request();
        $this->M_seeder_instansi = new SeederInstansi($this->request);
        $this->form_validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    $getInstansi_nama = $this->M_seeder_instansi->get_instansi_name()->getResult();

    public function run(){
        $data = [
            foreach ($getInstansi_nama as $isi) {
                [
                    'username'  => $isi->instansi_nama,
                    'petugas_nama' => $isi->instansi_nama,
                    'petugas_no_hp' => '-',
                    'petugas_email' => '-',
                    'instansi_id' => $isi->instansi_id,
                    'hak_akses' => 'petugas'

                ]
            }
        ];


        $data2 = [
            foreach ($getInstansi_nama as $isi2) {
                [
                    'username'  => $isi2->instansi_nama,
                    'password'  =>  base64_encode($this->encrypter->encrypt(1234)),
                    'hak_akses' => 'petugas'

                ]
            }
        ];
        $this->db->table('petugas')->insertBatch($data);
        $this->db->table('login')->insertBatch($data2);
    }
} 