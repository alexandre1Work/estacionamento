<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Mensalidades extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
          redirect('login');
        }

        $this->load->model('mensalidades_model');
    }

    public function index() {

        $data = array(
            'titulo' => 'Mensalidades cadastradas',
            'sub_titulo' => 'Chegou a hora de listar as Mensalidades cadastradas no banco de dados',
            'icone_view' => 'fas fa-hand-holding-usd',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'mensalidades' => $this->mensalidades_model->get_all(),
        );

        // echo '<pre>';
        // print_r ($data['mensalidades']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('mensalidades/index');
        $this->load->view('layout/footer');
    }

    public function core($mensalidade_id = NULL) {

        if(!$mensalidade_id) {
            //cadastrando...

        } else {

            if(!$this->core_model->get_by_id('mensalidades', array('mensalidade_id' => $mensalidade_id))) {
                $this->session->set_flashdata('error', 'Mensalidade não encontrada');
                redirect($this->router->fetch_class());

            } else {

                $this->form_validation->set_rules('mensalidade_precificacao_id','Categoria','required');

                if ($this->form_validation->run()){

                    /* Array
                    ( 
                        [mensalidade_mensalista_dia_vencimento] => 5
                        [mensalidade_precificacao_id] => 1 130,00
                        [mensalidade_valor_mensalidade] => 130,00
                        [mensalidade_status] => 0
                        [mensalidade_id] => 1
                        [mensalidade_mensalista_hidden_id] => 1
                        [mensalidade_precificacao_hidden_id] => 1
                    ) */

                    $data = elements(
                        array(
                            'mensalidade_precificacao_id',
                            'mensalidade_valor_mensalidade',
                            'mensalidade_mensalista_dia_vencimento',
                            'mensalidade_status',
                        ), $this->input->post()
                    );

                    $data['mensalidade_mensalista_id'] = $this->input->post('mensalidade_mensalista_hidden_id');

                    $data['mensalidade_precificacao_id'] = $this->input->post('mensalidade_precificacao_hidden_id');

                    if ($data['mensalidade_status']==1) {

                        $data['mensalidade_data_pagamento'] = date('Y-m-d H:i:s');
                    }

                    $data = html_escape($data);

                    $this->core_model->update('mensalidades',$data, array('mensalidade_id' => $mensalidade_id));
                    redirect($this->router->fetch_class());

                } else {
                    //erro de validação
                    $data = array(
                        'titulo' => 'Editar mensalidade',
                        'sub_titulo' => 'Chegou a hora de editar a mensalidade',
                        'icone_view' => 'fas fa-hand-holding-usd',
                        'texto_modal' => 'Os dados estão corretos? <br><br> Depois de salva só será possível alterar a "CATEGORIA" e a "SITUAÇÃO"',
                        'styles' => array(
                            'plugins/select2/dist/css/select2.min.css',
                        ),
                        'scripts' => array(
                            'plugins/mask/jquery.mask.min.js',
                            'plugins/mask/custom.js',
                            'plugins/select2/dist/js/select2.min.js',
                            'plugins/select2/dist/js/select2.min.js',
                            'js/mensalidades/mensalidades.js',
                        ),
    
                        'precificacoes' => $this->core_model->get_all('precificacoes', array('precificacao_ativa' => 1)),
                        'mensalistas' => $this->core_model->get_all('mensalistas', array('mensalista_ativo' => 1)),
                        
                        'mensalidade' => $this->core_model->get_by_id('mensalidades', array('mensalidade_id' => $mensalidade_id)),
                    );
            
                    $this->load->view('layout/header', $data);
                    $this->load->view('mensalidades/core');
                    $this->load->view('layout/footer');
                }
            }
        }
    }
}