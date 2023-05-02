<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");


class Address{
    var $CI = NULL;
    function __construct() {
        $this->CI = &get_instance();
    }

    // auth login - register 
    function auth() {
        $lokal ='http://192.168.27.55:8081/Auth/';
        $kubernetes ='http://kubernetes.pantirapih.id/Auth/';
        return $lokal; 
        }

    function getKokama() {
        $lokal = 'http://192.168.27.55:8384/Kokama/';
        return $lokal;
    }
    
    function getAllBarang() {
        $lokal = 'http://192.168.27.55:8384/Kokama/';
        return $lokal;
    }
    function tambah_ke_keranjang() {
        $lokal = ' http://192.168.27.55:8384/Kokama/';
        return $lokal;
    }
}