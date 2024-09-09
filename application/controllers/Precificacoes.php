<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Precificacoes extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
          redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Precificações cadastradas',
            'sub_titulo' => 'Chegou a hora de listar as precificações cadastradas no banco de dados',
            'icone_view' => 'ik ik-dollar-sign',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'precificacoes' => $this->core_model->get_all('precificacoes'),
        );

        // echo '<pre>';
        // print_r ($data['precificacoes']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('precificacoes/index');
        $this->load->view('layout/footer');
    }

    public function core($precificacao_id = NULL) {

        if(!$precificacao_id){
            //cadastrar
            $this->form_validation->set_rules('precificacao_categoria', 'Categoria', 'trim|required|min_length[5]|max_length[30]|is_unique[precificacoes.precificacao_categoria]');
            $this->form_validation->set_rules('precificacao_valor_hora', 'Valor hora', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('precificacao_valor_mensalidade', 'Valor mensalidade', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('precificacao_numero_vagas', 'Número vagas', 'trim|required|integer|greater_than[0]');

            if ($this->form_validation->run()) {

                $data = elements(
                    array(
                        'precificacao_categoria',
                        'precificacao_valor_hora',
                        'precificacao_valor_mensalidade',
                        'precificacao_numero_vagas',
                        'precificacao_ativa',
                    ), $this->input->post()
                );

                $data = html_escape($data);

                $this->core_model->insert('precificacoes', $data);
                redirect($this->router->fetch_class());
            } else { 

                //erro de validação

                $data = array(
                    'titulo' => 'Cadastrar precificação',
                    'sub_titulo' => 'Chegou a hora de cadastrar precificações',
                    'icone_view' => 'ik ik-dollar-sign',
                    'scripts' => array(
                        'plugins/mask/jquery.mask.min.js',
                        'plugins/mask/custom.js',
                    ),
                );
        
                $this->load->view('layout/header', $data);
                $this->load->view('precificacoes/core');
                $this->load->view('layout/footer');
            }
        } else {
            //Editando

            if(!$this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id))) {
                $this->session->set_flashdata('error', 'Precificação não encontrada');
                redirect($this->router->fetch_class());
            } else {

                /*
                [precificacao_id] => 1
                [precificacao_categoria] => Veículo pequeno
                [precificacao_valor_hora] => 10,00
                [precificacao_valor_mensalidade] => 130,00
                [precificacao_numero_vagas] => 30
                [precificacao_ativa] => 1
                [precificacao_data_alteracao] => 0000-00-00 00:00:00
                */

                $this->form_validation->set_rules('precificacao_categoria', 'Categoria', 'trim|required|min_length[5]|max_length[30]|callback_check_categoria');
                $this->form_validation->set_rules('precificacao_valor_hora', 'Valor hora', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('precificacao_valor_mensalidade', 'Valor mensalidade', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('precificacao_numero_vagas', 'Número vagas', 'trim|required|integer|greater_than[0]');

                if ($this->form_validation->run()) {

                    // echo '<pre>';
                    // print_r($this->input->post());
                    // exit();
                    $precificacao_ativa = $this -> input -> post('precificacao_ativa');

                    if($precificacao_ativa == 0) {
                        if($this->db->table_exists('estacionar')) {
                            if($this->core_model->get_by_id('estacionar', array('estacionar_precificacao_id' => $precificacao_id, 'estacionar_status' => 0))) {
                                $this->session->set_flashdata('error', 'Esta categoria está sendo utilizada em &nbsp; <i class="fas fa-parking"></i> &nbsp; Estacionar');
                                redirect($this->router->fetch_class());
                            }
                        }
                    }

                    if($precificacao_ativa == 0) {
                        if($this->db->table_exists('mensalidades')) {
                            if($this->core_model->get_by_id('mensalidades', array('mensalidade_precificacao_id' => $precificacao_id, 'mensalidade_status' => 0))) {
                                $this->session->set_flashdata('error', 'Esta categoria está sendo utilizada em &nbsp; <i class="fas fa-hand-holding-usd"></i> &nbsp; Mensalidades');
                                redirect($this->router->fetch_class());
                            }
                        }
                    }

                    $data = elements(
                        array(
                            'precificacao_categoria',
                            'precificacao_valor_hora',
                            'precificacao_valor_mensalidade',
                            'precificacao_numero_vagas',
                            'precificacao_ativa',
                        ), $this->input->post()
                    );

                    $data = html_escape($data);

                    $this->core_model->update('precificacoes', $data, array('precificacao_id' => $precificacao_id));
                    redirect($this->router->fetch_class());
                } else { 

                    //erro de validação

                    $data = array(
                        'titulo' => 'Editar precificação',
                        'sub_titulo' => 'Chegou a hora de editar a precificações cadastrada no banco de dados',
                        'icone_view' => 'ik ik-dollar-sign',
                        'scripts' => array(
                            'plugins/mask/jquery.mask.min.js',
                            'plugins/mask/custom.js',
                        ),
                        'precificacao' => $this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id)),
                    );
            
                    // echo '<pre>';
                    // print_r ($data['precificacao']);
                    // exit();
            
                    $this->load->view('layout/header', $data);
                    $this->load->view('precificacoes/core');
                    $this->load->view('layout/footer');
                }
            }
        }
    }

    public function check_categoria($precificacao_categoria) {

        $precificacao_id = $this->input->post('precificacao_id');

        if($this->core_model->get_by_id('precificacoes', array('precificacao_categoria' => $precificacao_categoria, 'precificacao_id !=' => $precificacao_id))) {
            
            $this->form_validation->set_message('check_categoria', 'Esta categoria já existe!');

            return FALSE;
        } else {
            return TRUE;
        }

    }

    public function del($precificacao_id = NULL){
        if(!$this->core_model->get_by_id('precificacoes', array('precificacao_id' =>        $precificacao_id))) {
            $this->session->set_flashdata('error', 'Precificação não encontrada');
            redirect($this->router->fetch_class());
        }

        if($this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id, 'precificacao_ativa' => 1))) {
            $this->session->set_flashdata('error', 'Precificação ativa não pode ser excluída!');
            redirect($this->router->fetch_class());
        }

        $this->core_model->delete('precificacoes', array('precificacao_id' => $precificacao_id));
        redirect($this->router->fetch_class());
    }

}
