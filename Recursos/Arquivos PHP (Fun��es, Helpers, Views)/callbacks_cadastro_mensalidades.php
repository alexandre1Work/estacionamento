public function check_data_com_dia_vencimento($mensalidade_data_vencimento) {

        if ($mensalidade_data_vencimento) {

            $mensalidade_data_vencimento = explode('-', $mensalidade_data_vencimento);

            $mensalidade_mensalista_dia_vencimento = $this->input->post('mensalidade_mensalista_dia_vencimento');

            if ($mensalidade_data_vencimento[2] != $mensalidade_mensalista_dia_vencimento) {
                $this->form_validation->set_message('check_data_com_dia_vencimento', 'Esse campo deve conter o mesmo dia que o "Melhor dia de vencimento"');
                return FALSE;
            } else {
                return true;
            }
        } else {
            $this->form_validation->set_message('check_data_com_dia_vencimento', 'Campo obrigatório');
            return FALSE;
        }
    }

    public function check_existe_mensalidade($mensalidade_data_vencimento) {

        /* Recupera o post */
        $mensalidade_mensalista_id = $this->input->post('mensalidade_mensalista_hidden_id');

        /* Verifica no banco se há mensalidade já cadastrada para o mensalista e coma data passsados no post */
        $mensalidade_user = $this->core_model->get_by_id('mensalidades', array('mensalidade_mensalista_id' => $mensalidade_mensalista_id, 'mensalidade_data_vencimento' => $mensalidade_data_vencimento));

        if ($mensalidade_user) {

            /* Faz o explode da $mensalidade_data_vencimento do post */
            $mensalidade_data_vencimento_post = explode('-', $mensalidade_data_vencimento);


            /* Faz o explode da $mensalidade_data_vencimento vinda do banco */
            $mensalidade_data_vencimento_user = explode('-', $mensalidade_user->mensalidade_data_vencimento);



            if ($mensalidade_data_vencimento_post[0] == $mensalidade_data_vencimento_user[0] && $mensalidade_data_vencimento_post[1] == $mensalidade_data_vencimento_user[1]) {
                $this->form_validation->set_message('check_existe_mensalidade', 'Para o mensalista informado, já existe uma mensalidade para essa data');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function check_data_valida($mensalidade_data_vencimento) {

        $data_atual = strtotime(date('Y-m-d'));

        $mensalidade_data_vencimento = strtotime($mensalidade_data_vencimento);

        /* Se a data de vencimento for menor que a data atual */
        if ($data_atual >= $mensalidade_data_vencimento) {
            $this->form_validation->set_message('check_data_valida', 'A data de vencimento deve ser corrente ou futura');
            return FALSE;
        } else {
            return TRUE;
        }
    }