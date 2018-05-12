<?php
    class user extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        function getKabupaten(){
            $query = $this->db->get('kabupaten');
            return $query->result();
        }

        public function create_user($nama, $no_telp, $email, $username, $password, $tgl_lahir, $alamat, $jk, $kabupaten, $status){
            $data = array(
                'id'            =>'NULL',
                'nama'          =>$nama,
                'no_telp'       =>$no_telp,
                'email'         =>$email,
                'alamat'        =>$alamat,
                'id_kabupaten'  =>$kabupaten,
                'jenis_kelamin' =>$jk,
                'create_at'     =>date('Y-m-d'),
                'tgl_lahir'     =>$tgl_lahir,
                'status_member' =>$status,
                'username'      =>$username,
                'password'      =>$password,
                'cookie'         =>'False'
            );

            return $this->db->insert('member',$data);
        }

        public function select_user(){
            $this->db->select('id,nama,no_telp,email,alamat,jenis_kelamin,status_member');
            $this->db->from('member');
            $query = $this->db->get();
            return $query->result();
        }

        
    }
?>