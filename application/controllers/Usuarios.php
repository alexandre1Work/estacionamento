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

                $perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();

                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[3]|max_length[20]');

                $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[3]|max_length[20]');

                $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[3]|max_length[30]|callback_username_check');

                $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required|min_length[3]|max_length[200]|callback_email_check');

                $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]');

                $this->form_validation->set_rules('confirmacao', 'Confirmação', 'trim|matches[password]');

                if($this->form_validation->run()){

                    /* 
                        [first_name] => Admin
                        [last_name] => istrator
                        [username] => administrator
                        [email] => admin@admin.com
                        [password] => 
                        [active] => 1
                    */

                    $data = elements(
                        array(
                        'first_name',
                        'last_name',
                        'username',
                        'email',
                        'password',
                        'active',
                        ), $this->input->post()
                    );

                    $password = $this->input->post('password');

                    //Não atualizar senha
                    if(!$password) {
                        unset($data['password']);
                    }

                    //sanitizar array
                    $data = html_escape($data);

                    // echo '<pre>';
                    // print_r($this->input->post());
                    // exit();

                    if ($this->ion_auth->update($usuario_id, $data)) {

                        $perfil_post = $this->input->post('perfil');

                        //Se for diferente atualiza o grupo
                        if($perfil_atual->id != $perfil_post) {
                            
                            $this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);
                            $this->ion_auth->add_to_group($perfil_post, $usuario_id);
                        }
                        
                        $this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
                    } else {
                        
                        $this->session->set_flashdata('error', 'Não foi possível atualizar os dados');
                    }

                    redirect($this->router->fetch_class());
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

    public function username_check($username) {

        $usuario_id = $this->input->post('usuario_id');

        if($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('username_check', 'Esse usuário já existe');
            return FALSE;
        } else {
            return TRUE;
        }

    }

    public function email_check($email) {

        $usuario_id = $this->input->post('usuario_id');

        if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('username_check', 'Esse e-mail já existe');
            return FALSE;
        } else {
            return TRUE;
        }

    }

}
