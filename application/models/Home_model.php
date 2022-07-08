<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function listarConteudoHome()
    {
        return $this->db->get('app_home')->result();
    }


    public function addConteudoHome($dados = NULL)
    {
        if (is_array($dados)) {
            $this->db->insert('app_home', $dados);
        }
    }

    public function getConteudoHome($id = NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('app_home')->row();
        }
    }


    public function deletarConteudoHome($id = NULL)
    {
        if ($id) {
            $this->db->delete('app_home', ['id' => $id]);
        }
    }


    public function atualizarConteudo($dados = NULL, $condicao = NULL)
    {
        if (is_array($dados) && is_array($condicao)) {
            $this->db->update('app_home', $dados, $condicao);
        }
    }
}
