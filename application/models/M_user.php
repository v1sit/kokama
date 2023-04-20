<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    
    public function getAllUsers() {
        return  $this->db->get('userweb')->result_array();
    }

    public function getdataUser($limit, $start, $keyword = null) {

        if($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('username', $keyword);
        }
       return $this->db->get('userweb', $limit, $start)->result_array();
    }
    
    public function countAllDataPengguna() {
        return $this->db->get('userweb')->num_rows();
    }

    
}
