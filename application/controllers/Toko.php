<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {
    
        public function index() {

            $data ['title'] = 'Toko';
            
            $result = $this->restclient->getAllBarang();
            $file = file_get_contents($result);
            $dt = json_decode($file);
            
            $data ['barang'] = $dt; 

            // $data['barang'] = $this->M_barang->tampilBarang()->result();

            $data['user'] = $this->db->get_where('userweb', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('user/toko', $data);
    }

    public function tambah_ke_keranjang($id) {
        
        $barang = $this->M_barang->find($id);

		 $data = array(
            'id'      => $barang->id,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg);

        $postData = stream_context_create(array(
		'http' => array (
						'method' => 'POST',
						'header' => "accept: application/json\r\n"."Content-Type: application/json\r\n",
						'content' => json_encode($data)
						)));

		$link = $this->restclient->getUser();
        $response = file_get_contents($link, FALSE, $postData);
        $userweb = json_decode($response);
 
        $this->cart->insert($data);
        redirect('toko');
    }

    public function detil_cart() {
        $data ['title'] = 'Detil Keranjang';
        $data['user'] = $this->db->get_where('userweb', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('user/cart',$data);
    }

    public function hapus_cart($rowid) {
        $data = [
            'rowid' => $rowid,
            'qty' => 0,
        ];
        $this->cart->update($data);

        redirect('toko/detil_cart');
    }
}