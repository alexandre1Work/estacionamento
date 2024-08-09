<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Core_model extends CI_Model{

    public function get_all($table = NULL, $condition = NULL) {

        if ($table && table_exists($table)) {

            if (is_array($condition)) {
                
                $this->db->where($condition);
            }

            return $this->db->get($table)->result();
        } else {
            return FALSE;
        }
    }

    public function get_by_id($table = NULL, $condition = NULL) {

        if ($table && table_exists($table) && is_array($condition)) {

            $this->db->where($condition);
            $this->db->limit(1);

            return $this->db->get($table)->row();
        } else {
            return FALSE;
        }
    }

    public function insert($table = NULL, $data = NULL) {

        if ($table && table_exists($table) && is_array($data)) {

            $this->db->insert($table, $data);

            if($this->db->affected_rows() > 0) {

                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            }else{
                $this->session->set_flashdata('error', 'Não foi possível salvar os dados!'); 
            }
        } else {
            return FALSE;
        }
    }

    public function update($table = NULL, $data = NULL, $condition = NULL) {

        if ($table && table_exists($table) && is_array($data) && is_array($condition)) {

            if($this->db->update($table, $data, $condition)){

                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');

            } else {
                $this->session->set_flashdata('error', 'Não foi possível salvar os dados!');
            }

        } else {
            return FALSE;
        }
    }

    public function delete($table = NULL, $condition = NULL) {

        if ($table && table_exists($table) && is_array($condition)) {
            
            if($this->db->delete($table, $condition)) {

                $this->session->set_flashdata('sucesso', 'Registro excluído com sucesso!');

            } else {
                $this->session->set_flashdata('error', 'Não foi possível excluir o registro!');
            }

        } else {
            return FALSE;
        }


    }

}