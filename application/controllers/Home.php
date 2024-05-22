<?php

defined('BASEPATH') or exit('Ação não permitida');

class Home extends CI_Controller{

    public function index(){
        $this->load->view('home/index');
    }
}