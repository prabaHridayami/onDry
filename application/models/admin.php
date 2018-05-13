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

        public function record_count($id,$table,$where) {
            $this->db->where($id,$where);
            return $this->db->count_all($table);
        }

        public function view_trans($limit,$start,$where){
            $this->db->order_by('id','desc');
            $this->db->limit($limit,$start);
            $this->db->join('paket', 'transaksi.id_paket = paket.id_paket', 'inner'); 
            $this->db->where('status', $where);
            $query = $this->db->get('transaksi');
            if($query->num_rows()>0){
                return $query->result();
            } else{
                return false;
            }
        }
    }
?>