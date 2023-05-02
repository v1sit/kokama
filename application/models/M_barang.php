<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {
    
    function tampilBarang() {
       return $this->db->get('barang');
    }
    
    function find($id) {

        $result = $this->db->where('id', $id)->limit(1)->get('barang');
        
            if($result->num_rows()> 0) {
                return $result->row();
            } else {
                return array();
            }
    }
}
