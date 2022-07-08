<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banners_model extends CI_Model
{
    //Listar os Logos Cadastrados
    public function listarBanners()
    {
        return $this->db->get('app_banners')->result();
    }


    //Adicionar novo Logo
    public function criarBanner($dados = NULL)
    {
        if (is_array($dados)) {
            $this->db->insert('app_banners', $dados);
        }
    }

    //Utilizar a ID do Logo para Buscar
    public function getBannerID($id = NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('app_banners')->row();
        }
    }

    //Apagar Logo
    public function apagarBanner($id = NULL)
    {
        if ($id) {
            $this->db->delete('app_banners', ['id' => $id]);
        }
    }

    public function atualizarBanner($dados = NULL, $condicao = NULL)
    {
        if (is_array($dados) && is_array($condicao)) {
            $this->db->update('app_banners', $dados, $condicao);
        }
    }
}
