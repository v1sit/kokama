<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('address');
		$this->load->library('restclient');
	}

	public function index()	{
		// kondisi validasi login user

			$data['title'] = 'Registrasi Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration.php');
			$this->load->view('templates/auth_footer');
	}

    function do_register() {
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password1 = $this->input->post('password1');
        $unit = $this->input->post('Unit');

        $register= array("name"=> $name,
                        "userName"=>$username,
                        "password"=>$password1,
                        "unit"=>$unit
					 );
					//  print_r($register); die();
		
		$postData = stream_context_create(array(
		'http' => array(
					'method' => 'POST',
					'header' => "accept: application/json\r\n"."Content-Type: application/json\r\n",
					'content' => json_encode($register)
					)
		));

		$link = $this->restclient->regUser();
        $response = file_get_contents($link, FALSE, $postData);
        $dt = json_decode($response);

        foreach ($dt as $value) {
			if(isset($dt->idUserWeb)) {
				$status = "berhasil";						
				break;
			}
			elseif(isset($dt->status)) {
				$status = "gagal";
				break;
		}
    }

        if($status == "berhasil") {
			$pesan = "<div class='alert alert-success text-center' style='margin-top: 20px;'> Selamat sudah selamat!.</div>";
		}
        else if($status == "gagal") {
			$pesan = "<div class='alert alert-danger text-center' style='margin-top: 20px;'> Gagal Lur! </div>";
		}


        $data['status']= $status;
		$data['content'] = "/auth/registration.php";
		$data['pesan'] = $pesan;

        $data['title'] = 'Registrasi Page';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registration.php');
        $this->load->view('templates/auth_footer');
}

    function getUnit() {
            $result = $this->restclient->getUnit();
            $file = file_get_contents($result);
            $dt = json_decode($file);

            $unit = array('' => 'pilih unit');

            foreach ($dt as $value) {
			    $unit[$value->idDepartment] = $value->namaDepartment;
		    }

        echo form_dropdown('unitAll',$unit);
    }
}
