<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sobre_model extends CI_Model
{

    public function listarConteudoSobre()
    {
        return $this->db->get('app_sobre')->result();
    }


    public function addConteudoSobre($dados = NULL)
    {
        if (is_array($dados)) {
            $this->db->insert('app_sobre', $dados);
        }
    }

    public function getConteudoSobre($id = NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('app_sobre')->row();
        }
    }


    public function deletarConteudoSobre($id = NULL)
    {
        if ($id) {
            $this->db->delete('app_sobre', ['id' => $id]);
        }
    }


    public function atualizarConteudoSobre($dados = NULL, $condicao = NULL)
    {
        if (is_array($dados) && is_array($condicao)) {
            $this->db->update('app_sobre', $dados, $condicao);
        }
    }
}
