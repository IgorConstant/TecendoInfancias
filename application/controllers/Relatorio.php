<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();


class Relatorio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('relatorio_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['titulo_site'] = 'Gerenciador de Conteúdo';
        $data['titulo_pagina'] = 'Relatório Anual';

        $data['app_relatorios'] = $this->relatorio_model->listarRelatorios();

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/listRelatorio');
        $this->load->view('dashboard/footer');
    }

    
    public function adicionarelatorio(){
        
    }
}
