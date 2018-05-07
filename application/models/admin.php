<?php
    class admin extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        function getKabupaten(){
            $query = $this->db->get('kabupaten');
            return $query->result();
        }

        public function select_admin(){
            $this->db->select('id,nama,no_telp,alamat,jenis_kelamin,create_at');
            $this->db->from('pegawai');
            $query = $this->db->get();
            return $query->result();
        }

        
    }
?>