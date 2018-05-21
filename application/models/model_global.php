<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_global extends CI_Model {
    
	public function get_data($array)
    {
        if (isset($array['table'])) {
            if (isset($array['select']))    $this->db->select($array['select']);
            if (isset($array['join']))      $this->db->join($array['join'][0],$array['join'][1]);
            if (isset($array['join2']))     $this->db->join($array['join2'][0],$array['join2'][1]);
            if (isset($array['join3']))     $this->db->join($array['join3'][0],$array['join3'][1]);
            if (isset($array['join4']))     $this->db->join($array['join4'][0],$array['join4'][1]);
            if (isset($array['where']))     $this->db->where($array['where']);
            if (isset($array['like']))      $this->db->like($array['like']);
            if (isset($array['or_like']))   $this->db->or_like($array['or_like']);
            if (isset($array['not_like']))  $this->db->not_like($array['not_like']);
            if (isset($array['order_by']))  $this->db->order_by($array['order_by']);
            if (isset($array['group_by']))  $this->db->group_by($array['group_by']);
            if (isset($array['limit']))     $this->db->limit($array['limit']);
            $this->db->from($array['table']);
            if (isset($array['data']) && $array['data'] == 'row') 
                return $this->db->get()->row_array();
            else
                return $this->db->get()->result_array();
        } else
            return array();
    }

    public function record_count($id,$table,$where) {
        $this->db->where($id,$where);
        return $this->db->count_all($table);
  
    }

    public function view_trans($limit,$start,$where){
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start);
        $this->db->join('paket', 'transaksi.id_paket = paket.id_paket', 'inner'); 
        $this->db->where('id_member', $where);
        $query = $this->db->get('transaksi');
        if($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }

    public function detail($where){
        $this->db->where('id_transaksi',$where);
        $this->db->join('jenis_pakaian','detail_transaksi.id_jenis_pakaian=jenis_pakaian.id_jenis_pakaian','inner');
        $query = $this->db->get('detail_transaksi');
        if($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }

    public function insert($data, $table){
    	$this->db->insert($table, $data);
        // $this->session->set_userdata('orderId', $this->db->insert_id());

    	if($this->db->insert_id() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }

    public function update($id, $data, $table, $where){
        $this->db->set($data);
		$this->db->where($id,$where);
		$this->db->update($table); 
    }

    public function delete($table, $where){
        // $this->db->delete($table, $where);
        $data = array('status' => -1);
        $this->db->where($where);
        $this->db->update($table, $data);

        if ($this->db->trans_status() === FALSE){
            return false;
        }
        else{
            return true;
        }
    }

    public function update_total($id,$data,$data2,$field,$table,$where){
        $this->db->set($field,$data+$data2,FALSE);
        $this->db->where($id,$where);
        $this->db->update($table);
    }

    public function select($id, $field, $table, $where){
        $this->db->select($field);
        $this->db->where($id, $where);
        $result=$this->db->get($table)->row();
        return $result->$field;
    }

    public function view_by($id){
        $this->db->where('id',$id);
        $query=$this->db->get('member');
        return $query->row();
    }

    public function max_id($field_id,$table){
        $this->db->select_max($field_id);
        $result = $this->db->get($table)->row();
        return $result->$field_id;
        
    }

    public function sum($field,$id, $table, $where){
        $this->db->select_sum($field);
        $this->db->where($id, $where);
        $this->db->limit(1);
        $query=$this->db->get($table)->row();
        return $query->$field;
        
        
    }

    public function query($query){
        $query = $this->db->query($query);
        if(strpos($query,'insert') !== false){
            return $this->db->affected_rows();
        }
        else if(strpos($query,'update') !== false){
            return $this->db->affected_rows();
        }
        else if(strpos($query,'select') !== false){
            return $query->result_array();
        }
    }

    public function upload($field,$file,$id,$where,$table){
        $this->db->set($field,$file);
        $this->db->where($id,$where);
        $this->db->update($table);
    }

   

}
?>
