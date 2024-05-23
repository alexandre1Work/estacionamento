<?php

defined('BASEPATH') or exit('Ação não permitida');

class Home extends CI_Controller{

    public function index(){

        $data = array(
            'titulo' => 'Home'
        );

        $this->load->view('layout/header', $data);
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }
}