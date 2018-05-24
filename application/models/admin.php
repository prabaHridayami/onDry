<?php
    class admin extends CI_Model{

        function getKabupaten(){ //query select data kabupaten
            $query = $this->db->get('kabupaten');
            return $query->result();
        }

        function fetch_data_member($query){ //mengambil data member dengan query like (untuk searching)
            $this->db->select('*');
            $this->db->like('id',$query);
            $this->db->or_like('nama',$query);
            $this->db->or_like('no_telp',$query);
            $this->db->or_like('email',$query);
            $this->db->or_like('alamat',$query);
            $this->db->or_like('jenis_kelamin',$query);
            $this->db->or_like('status_member',$query);
            $this->db->order_by('id','asc');
            $query = $this->db->get('member');
            return $query->result();
        }

        function fetch_data_pegawai($query){ //mengambil data pegawai dengan query like (untuk searching)
            $this->db->select('*');
            $this->db->like('id',$query);
            $this->db->or_like('nama',$query);
            $this->db->or_like('no_telp',$query);
            $this->db->or_like('alamat',$query);
            $this->db->or_like('jenis_kelamin',$query);
            $this->db->order_by('id','asc');
            $query = $this->db->get('member');
            return $query->result();
        }

        public function select_admin($limit,$start){ //mengambil data pegawai dengan limit & start untuk pagination
            $this->db->select('id,nama,no_telp,alamat,jenis_kelamin,create_at');
            $this->db->from('pegawai');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            if($query->num_rows()>0){
                return $query->result();
            } else{
                return false;
            }
        }

        public function record_count($id,$table,$where) { //menghitung jumlah data dalam tabel tertentu dengan syarat (for pagination)
            $this->db->where($id,$where);
            $this->db->from($table);
            return $this->db->count_all_results();
        }

        public function record($table) {  //menghitung jumlah data keseluhuran dalam tabel tertentu (for pagination)
            return $this->db->count_all($table);
        }

        public function view_trans($limit,$start,$where){ //menampilkan transaksi dengan pagination
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

        public function view_driver($limit,$start,$where){ //menampilkan transaksi dengan pagination
            $this->db->order_by('id','desc');
            $this->db->limit($limit,$start);
            $this->db->join('paket', 'transaksi.id_paket = paket.id_paket', 'inner'); 
            $this->db->where('status', 'Diantar');
            $this->db->where('id_pegawai', $where);
            $query = $this->db->get('transaksi');
            if($query->num_rows()>0){
                return $query->result();
            } else{
                return false;
            }
        }

        public function view_member($limit,$start){ //menampilkan member dengan pagination
            $this->db->order_by('id','asc');
            $this->db->limit($limit, $start);
            $query = $this->db->get('member');
            if($query->num_rows()>0){
                return $query->result();
            } else{
                return false;
            }
        }

        public function detail($where){ //menampilkan detail transaksi
            $this->db->where('id_transaksi',$where);
            $this->db->join('jenis_pakaian','detail_transaksi.id_jenis_pakaian=jenis_pakaian.id_jenis_pakaian','inner');
            $query = $this->db->get('detail_transaksi');
            if($query->num_rows()>0){
                return $query->result();
            } else{
                return false;
            }
        }

        public function update_action($data,$id,$where,$table){ //update ketika ada aksi
            $this->db->set('status',$data);
            $this->db->where($id,$where);
            $this->db->update($table);
        }

        public function update_sp($data,$id,$where,$table){ //update status pembayaran
            $this->db->set('status_pembayaran',$data);
            $this->db->where($id,$where);
            $this->db->update($table);
        }

        public function selectDriver(){
            $this->db->order_by('id','asc');
            $this->db->where('jabatan','driver');
            $query=$this->db->get('pegawai');
            if($query->num_rows()>0){
                return $query->result();
            
            } else{
                return false;
            }
        }

        public function selectMember($where){
            $this->db->where('id',$where);
            $this->db->select('nama, email');
            $query=$this->db->get('member');
            if($query->num_rows()>0){
                return $query->result();
            
            } else{
                return false;
            }
        }

        public function updateDriver($driver,$where){
            $this->db->set('id_pegawai',$driver);
            $this->db->where('id',$where);
            $this->db->update('transaksi');
        }
    }
?>