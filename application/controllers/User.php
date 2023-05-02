<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
        public function index() {

        $result = $this->restclient->getKokama();
		$file = file_get_contents($result);
		$dt = json_decode($file);
        
        $data ['namaPengguna'] = $dt; 
        
        // echo '<pre>';
        // print_r($dt); die();

        $this->load->library('pagination');

         // ambil data pencariannya
        if($this->input->post('submit')) {
            $data ['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else { 
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $data ['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('userweb', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('M_user');
        // $data['datauser'] = $this->M_user->getAllUsers();
        
        // panggil keywordnya target kolom dari db
        $this->db->like('name', $data['keyword']);
        $this->db->or_like('username', $data['keyword']);
        $this->db->from('userweb'); 

        //config
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 2;
        $data['total_rows'] =  $config['total_rows'];

        //  var_dump($config['total_rows']); die;
        
        //inisialisasi pagination
        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['datauser'] = $this->M_user->getdataUser($config['per_page'], $data['start'], $data['keyword']);
        $this->session->userdata('username()]');
        $this->load->view('user/dashboard', $data);
    }
}