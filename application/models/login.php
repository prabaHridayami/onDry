<?php
    class login extends CI_Model{

        private $table = "member";
        private $table2 = "pegawai";
        private $pk = "id";

        public function __construct() {
            parent::__construct();
        }

        // ambil data dari database yang usernamenya $username dan passwordnya p$assword
        public function login($username, $password)
        {
            $this->db->where('username', $username);
            $this->db->where('password', md5($password));
            return $this->db->get($this->table);
        }
        
        // update user
        public function update($data, $id)
        {
            $this->db->where($this->pk, $id);
            $this->db->update($this->table, $data);
        }
            
        // ambil data berdasarkan cookie
        public function get_by_cookie($cookie)
        {
            $this->db->where('cookie', $cookie);
            return $this->db->get($this->table);
        }

        public function adminLogin($username,$password){
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            return $this->db->get($this->table2);
        }

        // public function delete_cookie($cookie)
        // {
        //     $this->db->where('cookie', $cookie);
        //     return $this->db->delete($this->table);
        // }
    }
?>