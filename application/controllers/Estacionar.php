<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Estacionar extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
          redirect('login');
        }

        $this->load->model('estacionar_model');
    }

    public function index() {

        $data = array(
            'titulo' => 'Tickets de estacionamento cadastrados',
            'sub_titulo' => 'Chegou a hora de listar os tickets de estacionamento',
            'icone_view' => 'fas fa-parking',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'estacionados' => $this->estacionar_model->get_all(),
        );

        // echo '<pre>';
        // print_r ($data['estacionados']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('estacionar/index');
        $this->load->view('layout/footer');
    }
}