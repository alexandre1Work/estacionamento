<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Custom_error_404 extends CI_Controller{

    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
        $this->load->view('custom_error_404');
    }

}
