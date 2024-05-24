<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller{

    public function index() {

        $data = array(
            'titulo' => 'Usuários cadastrados',
            'sub_titulo' => 'Listando todos os usuários cadastrados no banco de dados',
            'titulo_tabela' => 'Exibindo usuários',
            'usuarios' => $this->ion_auth->users()->result(),
        );

        // echo '<pre>';
        // print_r ($data['usuarios']);
        // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }

}
