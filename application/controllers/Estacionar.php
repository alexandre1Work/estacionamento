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

    public function core($estacionar_id = NULL) {

        if(!$estacionar_id){
            //cadastrando
        }else{
            if (!$this->core_model->get_by_id('estacionar', array('estacionar_id' => $estacionar_id))) {
                $this->session->set_flashdata('error', 'Ticket não encontrado para encerramento');
                redirect($this->router->fetch_class());
            }else{
                //encerramento do ticket
                $data = array(
                    'titulo' => 'Encerrando ticket',
                    'sub_titulo' => 'Chegou a hora de encerrar o ticket de estacionamento',
                    'icone_view' => 'fas fa-parking',
                    'texto_modal' => 'Tem certeza que deseja encerrar este Ticket?',
                    'scripts' => array(
                        'plugins/mask/jquery.mask.min.js',
                        'plugins/mask/custom.js',
                        'js/estacionar/estacionar.js'
                    ),
                    'estacionado' => $this->core_model->get_by_id('estacionar', array('estacionar_id' => $estacionar_id)),

                    'precificacoes' => $this->core_model->get_all('precificacoes', array('precificacao_ativa' => 1)),

                    'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos', array('forma_pagamento_ativa' => 1)),
                );
        
                // echo '<pre>';
                // print_r ($data['estacionados']);
                // exit();
        
                $this->load->view('layout/header', $data);
                $this->load->view('estacionar/core');
                $this->load->view('layout/footer');
            }
        }
    }
}