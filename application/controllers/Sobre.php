<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();


class Sobre extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->model('sobre_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['titulo_site'] = 'Gerenciador de Conteúdo';
        $data['titulo_pagina'] = 'Conteúdo Pág. Sobre';

        $data['app_sobre'] = $this->sobre_model->listarConteudoSobre();

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/listSobre');
        $this->load->view('dashboard/footer');
    }


    public function adicionarsobre()
    {

        $this->form_validation->set_rules('tituloSobre', 'Titulo Sobre', 'required', array('required' => 'O Campo título é obrigatório'));
        $this->form_validation->set_rules('textoSobre', 'Conteúdo', 'required', array('required' => 'O Campo texto é obrigatório'));


        if ($this->form_validation->run() == TRUE) {
            $inputAdicionarSobre['titulo'] = $this->input->post('tituloSobre');
            $inputAdicionarSobre['texto'] = $this->input->post('textoSobre');

            $this->sobre_model->addConteudoSobre($inputAdicionarSobre);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Conteúdo Adicionado com Sucesso!</div>');
            redirect('sobre', 'refresh');
        } else {

            $data['titulo_site'] = 'Gerenciador de Conteúdo - Adicionar';
            $data['titulo_pagina'] = 'Adicionar - Conteúdo Home';


            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/addSobre');
            $this->load->view('dashboard/footer');
        }
    }


    public function editarsobre($id = NULL)
    {

        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um dos textos para editar =).</div>');
            redirect('sobre', 'refresh');
        }

        $query = $this->sobre_model->getConteudoSobre($id);

        $this->form_validation->set_rules('tituloSobre', 'Titulo Conteúdo', 'required', array('required' => 'O Campo título é obrigatório'));
        $this->form_validation->set_rules('textoSobre', 'Conteúdo', 'required', array('required' => 'O Campo texto é obrigatório'));


        if ($this->form_validation->run() == TRUE) {
            $inputEditarSobre['titulo'] = $this->input->post('tituloSobre');
            $inputEditarSobre['texto'] = $this->input->post('textoSobre');

            $this->sobre_model->atualizarConteudo($inputEditarSobre, ['id' => $this->input->post('idSobre')]);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Conteúdo atualizado com sucesso!</div>');
            redirect('sobre', 'refresh');
        } else {
            $data['titulo_pagina'] = 'Editar Conteúdo';
            $data['query'] = $query;

            //Load dos arquivos de layout
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/editSobre');
            $this->load->view('dashboard/footer');
        }
    }


    public function deletarsobre($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um dos textos para deletar =).</div>');
            redirect('sobre', 'refresh');
        }

        $query = $this->sobre_model->deletarConteudoHome($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Conteúdo não encontrado</div>');
        }

        $this->sobre_model->deletarConteudoHome($query->id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Conteúdo deletado com sucesso!</div>');
        redirect('home', 'refresh');
    }
}
