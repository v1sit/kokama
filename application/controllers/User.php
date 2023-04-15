<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

    public function index() {

        $data ['title'] = 'Dashboard';
        // $data['user'] = $this->db->get_where('userweb', ['username' => $this->session->userdata('username')])->row_array();
        // panggil data pengguna dari model
        $data['user'] = $this->M_user->getAllUsers();

        // panggil model M_user
        $this->load->model('M_user');
        $this->session->userdata('username()');
        $this->load->view('user/index', $data);

        // Mengambil semua data pengguna dari model
        // $tabeluser['user'] = $this->M_user->getAllUsers();

        // Menampilkan data pengguna ke dalam view
        // $this->load->view('user/index', $data);

    }

}