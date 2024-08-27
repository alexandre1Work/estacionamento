<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Formas extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
          redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Formas de pagamento cadastradas',
            'sub_titulo' => 'Chegou a hora de listar as formas de pagamento cadastradas no banco de dados',
            'icone_view' => 'fas fa-comment-dollar',
                //tiramos o array pq não tem grande volume de dados
            'formas' => $this->core_model->get_all('formas_pagamentos'),
        );

        // echo '<pre>';
        // print_r ($data['precificacoes']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('formas/index');
        $this->load->view('layout/footer');
    }

    public function core($forma_pagamento_id = NULL) {

        if(!$forma_pagamento_id) {
            
            //cadastrando
        }else{

            if(!$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))){
                $this->session->set_flashdata('error', 'Forma de pagamento não encontrada');
                redirect($this->router->fetch_class());
            }else{
                //editando

                $this->form_validation->set_rules('forma_pagamento_nome', 'Nome', 'trim|required|max_length[30]|callback_check_pagamento_nome');

                if($this->form_validation->run()) {

                    $data = elements(
                        array(
                            'forma_pagamento_nome',
                            'forma_pagamento_ativa',
                        ), $this->input->post()
                    );

                    $data = html_escape($data);

                    $this->core_model->update('formas_pagamentos', $data, array('forma_pagamento_id' => $forma_pagamento_id));
                    redirect($this->router->fetch_class());

                }else{
                    //erro de validação
                    $data = array(
                        'titulo' => 'Editar forma de pagamento',
                        'sub_titulo' => 'Chegou a hora de editar a forma de pagamento',
                        'icone_view' => 'fas fa-comment-dollar',
                            //tiramos o array pq não tem grande volume de dados
                        'forma' => $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id)),
                    );
            
                    // echo '<pre>';
                    // print_r ($data['forma']);
                    // exit();
            
                    $this->load->view('layout/header', $data);
                    $this->load->view('formas/core');
                    $this->load->view('layout/footer');
                }
            }
        }
    }

    public function check_pagamento_nome($forma_pagamento_nome) {

        $forma_pagamento_id = $this->input->post('forma_pagamento_id');

        if($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_nome' => $forma_pagamento_nome, 'forma_pagamento_id !=' => $forma_pagamento_id))){
            $this->form_validation->set_message('check_pagamento_nome', 'Forma de pagamento já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}