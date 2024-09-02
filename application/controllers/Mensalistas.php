<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Mensalistas extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
          redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Mensalistas cadastrados',
            'sub_titulo' => 'Chegou a hora de listar os Mensalistas cadastrados no banco de dados',
            'icone_view' => 'fa fa-user-tie',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'mensalistas' => $this->core_model->get_all('mensalistas'),
        );

        // echo '<pre>';
        // print_r ($data['mensalistas']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('mensalistas/index');
        $this->load->view('layout/footer');
    }

    public function core($mensalista_id = NULL) {

        if(!$mensalista_id){
            //cadastrando

                $this->form_validation->set_rules('mensalista_nome', 'Nome', 'trim|required|min_length[3]|max_length[20]');
                $this->form_validation->set_rules('mensalista_sobrenome', 'Sobrenome', 'trim|required|min_length[3]|max_length[150]');
                $this->form_validation->set_rules('mensalista_data_nascimento', 'Data nascimento', 'required');
                $this->form_validation->set_rules('mensalista_cpf', 'CPF', 'trim|required|exact_length[14]|is_unique[mensalistas.mensalista_cpf]|callback_valida_cpf');
                $this->form_validation->set_rules('mensalista_rg', 'RG', 'trim|required|min_length[7]|max_length[14]|is_unique[mensalistas.mensalista_rg]');
                $this->form_validation->set_rules('mensalista_email', 'E-mail', 'trim|required|valid_email|max_length[50]|is_unique[mensalistas.mensalista_email]');
                $mensalista_telefone_fixo =$this->input->post('mensalista_telefone_fixo');
                if(!empty($mensalista_telefone_fixo)){
                    $this->form_validation->set_rules('mensalista_telefone_fixo', 'Telefone Fixo', 'trim|exact_length[14]|is_unique[mensalistas.mensalista_telefone_fixo]');
                }
                $this->form_validation->set_rules('mensalista_telefone_movel', 'Telefone Movel', 'trim|required|min_length[14]|max_length[15]|is_unique[mensalistas.mensalista_telefone_movel]');
                $this->form_validation->set_rules('mensalista_cep', 'CEP', 'trim|required|exact_length[9]');
                $this->form_validation->set_rules('mensalista_endereco', 'Endereço', 'trim|required|min_length[3]|max_length[150]');
                $this->form_validation->set_rules('mensalista_numero_endereco', 'Número', 'trim|required|max_length[20]');
                $this->form_validation->set_rules('mensalista_bairro', 'Bairro', 'trim|required|min_length[3]|max_length[45]');
                $this->form_validation->set_rules('mensalista_cidade', 'Cidade', 'trim|required|min_length[3]|max_length[45]');
                $this->form_validation->set_rules('mensalista_estado', 'UF', 'trim|required|exact_length[2]');
                $this->form_validation->set_rules('mensalista_complemento', 'Complemento', 'trim|max_length[145]');
                $this->form_validation->set_rules('mensalista_dia_vencimento', 'Dia vencimento mensalidade', 'trim|required|integer|greater_than[0]|less_than[32]');
                $this->form_validation->set_rules('mensalista_obs', 'Observações', 'trim|max_length[500]');

            if($this->form_validation->run()) {

                $data = elements(
                    array(
                        'mensalista_nome',
                        'mensalista_sobrenome',
                        'mensalista_data_nascimento',
                        'mensalista_cpf',
                        'mensalista_rg',
                        'mensalista_email',
                        'mensalista_telefone_fixo',
                        'mensalista_telefone_movel',
                        'mensalista_cep',
                        'mensalista_endereco',
                        'mensalista_numero_endereco',
                        'mensalista_bairro',
                        'mensalista_cidade',
                        'mensalista_estado',
                        'mensalista_complemento',
                        'mensalista_ativo',
                        'mensalista_dia_vencimento',
                        'mensalista_obs',
                    ), $this->input->post()
                );

                $data['mensalista_estado'] = strtoupper($this->input->post('mensalista_estado'));

                $data = html_escape($data);

                $this->core_model->insert('mensalistas', $data);
                redirect($this->router->fetch_class());
                
            } else {
                
                //erro de validação
                $data = array(
                    'titulo' => 'Editar Mensalista',
                    'sub_titulo' => 'Chegou a hora de listar o Mensalista',
                    'icone_view' => 'fa fa-user-tie',
                    'scripts' => array(
                        'plugins/mask/jquery.mask.min.js',
                        'plugins/mask/custom.js',
                    ),
                    'mensalista' => $this->core_model->get_by_id('mensalistas', array('mensalista_id' => $mensalista_id)),
                );
        
        
                $this->load->view('layout/header', $data);
                $this->load->view('mensalistas/core');
                $this->load->view('layout/footer');
            }

        }else{
            if(!$this->core_model->get_by_id('mensalistas', array('mensalista_id' => $mensalista_id))){
                $this->session->set_flashdata('error', 'Mensalista não encontrado');
                redirect($this->router->fetch_class());
            }else{
                //editando

                
                $this->form_validation->set_rules('mensalista_nome', 'Nome', 'trim|required|min_length[3]|max_length[20]');
                $this->form_validation->set_rules('mensalista_sobrenome', 'Sobrenome', 'trim|required|min_length[3]|max_length[150]');
                $this->form_validation->set_rules('mensalista_data_nascimento', 'Data nascimento', 'required');
                $this->form_validation->set_rules('mensalista_cpf', 'CPF', 'trim|required|exact_length[14]|callback_valida_cpf');
                $this->form_validation->set_rules('mensalista_rg', 'RG', 'trim|required|min_length[7]|max_length[14]|callback_check_rg');
                $this->form_validation->set_rules('mensalista_email', 'E-mail', 'trim|required|valid_email|max_length[50]|callback_check_email');
                $mensalista_telefone_fixo =$this->input->post('mensalista_telefone_fixo');
                if(!empty($mensalista_telefone_fixo)){
                    $this->form_validation->set_rules('mensalista_telefone_fixo', 'Telefone Fixo', 'trim|exact_length[14]|callback_check_telefone_fixo');
                }
                $this->form_validation->set_rules('mensalista_telefone_movel', 'Telefone Movel', 'trim|required|min_length[14]|max_length[15]|callback_check_telefone_movel');
                $this->form_validation->set_rules('mensalista_cep', 'CEP', 'trim|required|exact_length[9]');
                $this->form_validation->set_rules('mensalista_endereco', 'Endereço', 'trim|required|min_length[3]|max_length[150]');
                $this->form_validation->set_rules('mensalista_numero_endereco', 'Número', 'trim|required|max_length[20]');
                $this->form_validation->set_rules('mensalista_bairro', 'Bairro', 'trim|required|min_length[3]|max_length[45]');
                $this->form_validation->set_rules('mensalista_cidade', 'Cidade', 'trim|required|min_length[3]|max_length[45]');
                $this->form_validation->set_rules('mensalista_estado', 'UF', 'trim|required|exact_length[2]');
                $this->form_validation->set_rules('mensalista_complemento', 'Complemento', 'trim|max_length[145]');
                $this->form_validation->set_rules('mensalista_dia_vencimento', 'Dia vencimento mensalidade', 'trim|required|integer|greater_than[0]|less_than[32]');
                $this->form_validation->set_rules('mensalista_obs', 'Observações', 'trim|max_length[500]');
            /*             
                [mensalista_nome] => Lucio
                [mensalista_sobrenome] => Souza
                [mensalista_data_nascimento] => 2020-03-13
                [mensalista_cpf] => 359.731.420-19
                [mensalista_rg] => 334.44644-12
                [mensalista_email] => lucio@gmail.com
                [mensalista_telefone_fixo] => 
                [mensalista_telefone_movel] => (41) 9999-9999
                [mensalista_cep] => 80530-000
                [mensalista_endereco] => Rua de Curitiba
                [mensalista_numero_endereco] => 45
                [mensalista_bairro] => Centro
                [mensalista_cidade] => Curitiba
                [mensalista_estado] => PR
                [mensalista_complemento] => 
                [mensalista_ativo] => 1
                [mensalista_dia_vencimento] => 31
                [mensalista_obs] =>  
            */
       
                if ($this->form_validation->run()) {

                    $mensalista_ativo = $this -> input -> post('precificacao_ativa');

                    if($mensalista_ativo == 0) {

                        if($this->db->table_exists('mensalidades')) {

                            if($this->core_model->get_by_id('mensalidades', array('mensalidade_mensalista_id' => $mensalista_id, 'mensalidade_status' => 0))) {
                                $this->session->set_flashdata('error', 'Ação não permitida: Este mensalista não pode ser desativado porque existem mensalidades em aberto.');
                                redirect($this->router->fetch_class());
                            }
                        }
                    }
                

                $data = elements(
                    array(
                        'mensalista_nome',
                        'mensalista_sobrenome',
                        'mensalista_data_nascimento',
                        'mensalista_cpf',
                        'mensalista_rg',
                        'mensalista_email',
                        'mensalista_telefone_fixo',
                        'mensalista_telefone_movel',
                        'mensalista_cep',
                        'mensalista_endereco',
                        'mensalista_numero_endereco',
                        'mensalista_bairro',
                        'mensalista_cidade',
                        'mensalista_estado',
                        'mensalista_complemento',
                        'mensalista_ativo',
                        'mensalista_dia_vencimento',
                        'mensalista_obs',
                    ), $this->input->post()
                );

                $data['mensalista_estado'] = strtoupper($this->input->post('mensalista_estado'));

                $data = html_escape($data);

                $this->core_model->update('mensalistas',$data, array('mensalista_id' => $mensalista_id));
                redirect($this->router->fetch_class());
                
            } else {
                
                //erro de validação
                $data = array(
                    'titulo' => 'Editar Mensalista',
                    'sub_titulo' => 'Chegou a hora de listar o Mensalista',
                    'icone_view' => 'fa fa-user-tie',
                    'scripts' => array(
                        'plugins/mask/jquery.mask.min.js',
                        'plugins/mask/custom.js',
                    ),
                    'mensalista' => $this->core_model->get_by_id('mensalistas', array('mensalista_id' => $mensalista_id)),
                );
        
                // echo '<pre>';
                // print_r ($data['mensalista']);
                // exit();
        
                $this->load->view('layout/header', $data);
                $this->load->view('mensalistas/core');
                $this->load->view('layout/footer');
            }

            }
        }
    }

    public function valida_cpf($cpf) {

        if ($this->input->post('mensalista_id')) {

            $mensalista_id = $this->input->post('mensalista_id');

            if ($this->core_model->get_by_id('mensalistas', array('mensalista_id !=' => $mensalista_id, 'mensalista_cpf' => $cpf))) {
                $this->form_validation->set_message('valida_cpf', 'O campo {field} já existe, ele deve ser único');
                return FALSE;
            }
        }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

            $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c); // se php < 7.4 $cpf{$c}
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) { // se php < 7.4 $cpf{$c}
                    $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

    public function check_rg($mensalista_rg){
        $mensalista_id = $this->input->post('mensalista_id');

        if ($this->core_model->get_by_id('mensalistas', array('mensalista_id !=' => $mensalista_id, 'mensalista_rg' => $mensalista_rg))) {
            $this->form_validation->set_message('check_rg', 'O campo {field} já existe, ele deve ser único');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function check_email($mensalista_email){
        $mensalista_id = $this->input->post('mensalista_id');

        if ($this->core_model->get_by_id('mensalistas', array('mensalista_id !=' => $mensalista_id, 'mensalista_email' => $mensalista_email))) {
            $this->form_validation->set_message('check_email', 'O campo {field} já existe, ele deve ser único');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function check_telefone_fixo($mensalista_telefone_fixo){
        $mensalista_id = $this->input->post('mensalista_id');

        if ($this->core_model->get_by_id('mensalistas', array('mensalista_id !=' => $mensalista_id, 'mensalista_telefone_fixo' => $mensalista_telefone_fixo))) {
            $this->form_validation->set_message('check_telefone_fixo', 'O campo {field} já existe, ele deve ser único');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function check_telefone_movel($mensalista_telefone_movel){
        $mensalista_id = $this->input->post('mensalista_id');

        if ($this->core_model->get_by_id('mensalistas', array('mensalista_id !=' => $mensalista_id, 'mensalista_telefone_movel' => $mensalista_telefone_movel))) {
            $this->form_validation->set_message('check_telefone_movel', 'O campo {field} já existe, ele deve ser único');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function del($mensalista_id = NULL) {
        //se não foi passaado ao metodo del um id ele retorna
        //OU se foi passado mas não existe tbm retorna o erro
        if(!$mensalista_id || !$this->core_model->get_by_id('mensalistas', array('mensalista_id' => $mensalista_id))){
            $this->session->set_flashdata('error', 'Mensalista não encontrado');
            redirect($this->router->fetch_class());
        }
        // se estiver tentando deletar um mensalista ativo
        if($this->core_model->get_by_id('mensalistas', array('mensalista_id' => $mensalista_id, 'mensalista_ativo' => 1))){
            $this->session->set_flashdata('error', 'Não é possivel excluir mensalista ativo');
            redirect($this->router->fetch_class());
        } 
        // passando as verificações chega o metodo de del
        $this->core_model->delete('mensalistas', array('mensalista_id' => $mensalista_id));
        redirect($this->router->fetch_class());
    }
}