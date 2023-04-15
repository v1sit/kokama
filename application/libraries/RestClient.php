<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");


class RestClient {
  private $CI;
  function __construct() {
    $this->CI = &get_instance();
  }

  function address() {
    return $this->CI->load->library('address');
  }

  //auth login - register
  function getUser() {
    $this->address();
    $userweb = $this->CI->address->auth();
    $do_login = 'loginWebKokama';
    return $userweb.$do_login;
  }

   function regUser() {
    $this->address();
    $regUser = $this->CI->address->auth();
    $do_register = 'registerUserKokama';
    return $regUser.$do_register;
  }

  function getUnit() {
    $this->address();
    $getUnit = $this->CI->address->auth();
    $get_unit = 'getAllUnit';
    return $getUnit.$get_unit;
  }
}

  

  