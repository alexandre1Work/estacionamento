<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller{

    public function index() {

        $data = array(
            'titulo' => 'Usuários cadastrados',
            'sub_titulo' => 'Chegou a hora de listar os usuários cadastrados no banco de dados',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'usuarios' => $this->ion_auth->users()->result(),
        );

        // echo '<pre>';
        // print_r ($data['usuarios']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }

    public function core($usuario_id = NULL) {

        if(!$usuario_id){

            exit('Pode cadastra um novo usuário');

            //cadastro de novo usuário

        }
        else{

            //Edita o usuário

            if(!$this->ion_auth->user($usuario_id)->row()){
                exit('Usuário não existe');
            }
            else{

                //Editar Usuário

                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[3]|max_length[20]');

                $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[3]|max_length[20]');

                $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[3]|max_length[30]');

                $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required|min_length[3]|max_length[200]');

                $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]');

                $this->form_validation->set_rules('confirmacao', 'Confirmação', 'trim|matches[password]');

                if($this->form_validation->run()){

                    echo '<pre>';
                    print_r ($this->input->post());
                    exit();

                } else {
                    //erro de validação

                    $data = array(
                        'titulo' => 'Editar Usuário',
                        'sub_titulo' => 'Chegou a hora de editar o usuário',
                        'icone_view' => 'ik ik-user',
                        'usuarios' => $this->ion_auth->user($usuario_id)->row(), //get all users
                        'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                    );
            
                    // echo '<pre>';
                    // print_r ($data['perfil_usuario']);
                    // exit();
            
                    $this->load->view('layout/header', $data);
                    $this->load->view('usuarios/core');
                    $this->load->view('layout/footer');
                }

            }

        }


        
    }


}
