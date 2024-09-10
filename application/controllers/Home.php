<?php

defined('BASEPATH') or exit('Ação não permitida');

class Home extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
          redirect('login');
        }

    }

    public function index() {

        $data = array(
            'titulo' => 'Home',
            'sub_titulo' => 'Seja muito bem vindo(a) ao Park Cloud!',
            'icone_view' => 'ik ik-home',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                'dist/css/estacionar.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),

            /*
            Inicio numero vagas por categoria
            */
            'numero_vagas_pequeno' => $this->estacionar_model->get_numero_vagas(1), //veiculo p

            'vagas_ocupadas_pequeno' => $this->core_model->get_all('estacionar', array('estacionar_status' => 0, 'estacionar_precificacao_id' => 1)),

            'numero_vagas_medio' => $this->estacionar_model->get_numero_vagas(2), //veiculo m

            'vagas_ocupadas_medio' => $this->core_model->get_all('estacionar', array('estacionar_status' => 0, 'estacionar_precificacao_id' => 2)),

            'numero_vagas_grande' => $this->estacionar_model->get_numero_vagas(4), //veiculo m

            'vagas_ocupadas_grande' => $this->core_model->get_all('estacionar', array('estacionar_status' => 0, 'estacionar_precificacao_id' => 4)),

            'numero_vagas_moto' => $this->estacionar_model->get_numero_vagas(5), //veiculo m

            'vagas_ocupadas_moto' => $this->core_model->get_all('estacionar', array('estacionar_status' => 0, 'estacionar_precificacao_id' => 5)),



            //informações dos cards
            'numero_total_vagas' => $this->home_model->get_total_vagas(),
            'total_estacionados_agora' => $this->home_model->count_all('estacionar', array('estacionar_status' => 0)),

            'total_mensalidades' => $this->home_model->get_total_mensalidades(),
            'total_mensalidades_pagas' => $this->home_model->count_all('mensalidades', array('mensalidade_status' => 1)),
            'total_mensalidades_abertas' => $this->home_model->count_all('mensalidades', array('mensalidade_status' => 0)),

            'total_avulsos' => $this->home_model->get_total_avulsos(),
            'total_avulsos_pagos' => $this->home_model->count_all('estacionar', array('estacionar_status' => 1)),
            'total_avulsos_abertos' => $this->home_model->count_all('estacionar', array('estacionar_status' => 0)),

            'total_mensalistas' => $this->home_model->count_all('mensalistas'),

            'total_mensalistas_ativos' => $this->home_model->count_all('mensalistas', array('mensalista_ativo' => 1)),

            'total_mensalistas_inativos' => $this->home_model->count_all('mensalistas', array('mensalista_ativo' => 0)),

        );

        // echo '<pre>';
        // print_r ($data['total_mensalistas']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }
}