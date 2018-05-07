<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
    Author : Anggi Rahman Syamsuddin
    Email  : anggir13@gmail.com
    date   : 29 Oktober 2015
*/

class Model_global extends CI_Model {
	public function syncUser($data){
		$q=$this->db->query("SELECT id_peserta FROM peserta WHERE id_peserta='$data[id_peserta]'  LIMIT 1");
		if($data['flag_sosmed']=="1"){
			$data['cs']='1a3z3euKFOdIyjzpkmo9e2MQK';
			$data['ck']='2NsERshUMjxBZAmMW3Ersl50YZwUjZkOIDQsbqQGyMP2zyVmTy';
		}else{
			unset($data['oauth_token']);
			unset($data['oauth_token_secret']);
		}
		if($q->num_rows()==0){
			$data['create_time']=date('Y-m-d H:i:s');
			$this->db->insert('peserta',$data);
		}else{ 
			$this->db->update('peserta',$data, array('id_peserta' => $data['id_peserta']));
		}
		return true;
    }
    
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

    public function update($data, $table, $where){
		$this->db->where($where);
		$this->db->update($table, $data); 
        if ($this->db->trans_status() === FALSE){
            return false;
        }
        else{
            return true;
        }
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

    /* MongoDB Custom Library */
    // public function get_data($array)
    // {
    //     if (isset($array['table'])) {
    //         if (isset($array['select']))    $this->cimongo->select($array['select']); //Array
    //         if (isset($array['where']))     $this->cimongo->where($array['where'], TRUE); //Array
    //         if (isset($array['like']))      $this->cimongo->like($array['like']['field'], $array['like']['value']);
    //         if (isset($array['or_like']))   $this->cimongo->or_like($array['or_like']['field'], $array['or_like']['value']); //'value' => Array
    //         if (isset($array['not_like']))  $this->cimongo->not_like($array['not_like']['field'], $array['not_like']['value']); //'value' => Array
    //         if (isset($array['order_by']))  $this->cimongo->order_by($array['order_by']); //Array (e.g) array('name' => 'ASC')
    //         if (isset($array['limit']))     $this->cimongo->limit($array['limit']);
    //         $query = $this->cimongo->get($array['table']);
    //         if (isset($array['data']) && $array['data'] == 'row') 
    //             return $query->row_array();
    //         else
    //             return $query->result_array();
    //     } else
    //         return array();
    // }

    // public function insert($data, $table){
    //     $insert = $this->cimongo->insert($table, $data);

    //     if($insert == TRUE){
    //         return $this->cimongo->insert_id();
    //     }
    //     else{
    //         return -1;
    //     }
    // }

    // public function update($data, $table, $where){
    //     $this->cimongo->where($where, TRUE); // Array
    //     $update = $this->cimongo->update($table, $data);
        
    //     if ($update === FALSE){
    //         return false;
    //     }
    //     else{
    //         return true;
    //     }
    // }

    // public function delete($table, $where){
    //     $data = array('isDelete' => TRUE);
    //     $this->cimongo->where($where, TRUE); // Array
    //     $update = $this->cimongo->update($table, $data);

    //     if ($update === FALSE){
    //         return false;
    //     }
    //     else{
    //         return true;
    //     }
    // }
    /* END MongoDB Custom Library */
}
?>
