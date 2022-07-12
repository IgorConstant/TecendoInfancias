<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banners_model extends CI_Model
{

    public function listarBanners()
    {
        return $this->db->get('app_banners')->result();
    }



    public function criarBanner($dados = NULL)
    {
        if (is_array($dados)) {
            $this->db->insert('app_banners', $dados);
        }
    }


    public function getBannerID($id = NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('app_banners')->row();
        }
    }


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
