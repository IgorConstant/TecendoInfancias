<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relatorio_model extends CI_Model
{

    public function listarRelatorios()
    {
        return $this->db->get('app_relatorioanual')->result();
    }



    public function addRelatorio($dados = NULL)
    {
        if (is_array($dados)) {
            $this->db->insert('app_relatorioanual', $dados);
        }
    }

    public function getRelatorioID($id = NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('app_relatorioanual')->row();
        }
    }


    public function apagarRelatorio($id = NULL)
    {
        if ($id) {
            $this->db->delete('app_relatorioanual', ['id' => $id]);
        }
    }

    public function atualizarBanner($dados = NULL, $condicao = NULL)
    {
        if (is_array($dados) && is_array($condicao)) {
            $this->db->update('app_relatorioanual', $dados, $condicao);
        }
    }
}
