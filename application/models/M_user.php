<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    
    public function getAllUsers() {
        $query = $this->db->get('userweb');
        return $query->result();

        
    }
    
}
