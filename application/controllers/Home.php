<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();


class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->model('home_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['titulo_site'] = 'Gerenciador de Conteúdo';
        $data['titulo_pagina'] = 'Conteúdo Home';

        $data['app_home'] = $this->home_model->listarConteudoHome();

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/listHome');
        $this->load->view('dashboard/footer');
    }


    public function adicionarconteudo()
    {

        $this->form_validation->set_rules('tituloConteudo', 'Titulo Conteúdo', 'required', array('required' => 'O Campo título é obrigatório'));
        $this->form_validation->set_rules('textoConteudo', 'Conteúdo', 'required', array('required' => 'O Campo texto é obrigatório'));


        if ($this->form_validation->run() == TRUE) {
            $inputAdicionarConteudo['titulo'] = $this->input->post('tituloConteudo');
            $inputAdicionarConteudo['texto'] = $this->input->post('textoConteudo');

            $this->home_model->addConteudoHome($inputAdicionarConteudo);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Conteúdo Adicionado com Sucesso!</div>');
            redirect('home', 'refresh');
        } else {

            $data['titulo_site'] = 'Gerenciador de Conteúdo - Adicionar';
            $data['titulo_pagina'] = 'Adicionar - Conteúdo Home';


            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/addConteudo');
            $this->load->view('dashboard/footer');
        }
    }


    public function editarconteudo($id = NULL)
    {

        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um dos textos para editar =).</div>');
            redirect('home', 'refresh');
        }

        $query = $this->home_model->getConteudoHome($id);

        $this->form_validation->set_rules('tituloConteudo', 'Titulo Conteúdo', 'required', array('required' => 'O Campo título é obrigatório'));
        $this->form_validation->set_rules('textoConteudo', 'Conteúdo', 'required', array('required' => 'O Campo texto é obrigatório'));


        if ($this->form_validation->run() == TRUE) {
            $inputEditarConteudo['titulo'] = $this->input->post('tituloConteudo');
            $inputEditarConteudo['texto'] = $this->input->post('textoConteudo');

            $this->home_model->atualizarConteudo($inputEditarConteudo, ['id' => $this->input->post('idConteudo')]);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Conteúdo atualizado com sucesso!</div>');
            redirect('home', 'refresh');
        } else {
            $data['titulo_pagina'] = 'Editar Conteúdo';
            $data['query'] = $query;

            //Load dos arquivos de layout
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/editHome');
            $this->load->view('dashboard/footer');
        }
    }


    public function deletarconteudo($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um dos textos para deletar =).</div>');
            redirect('home', 'refresh');
        }

        $query = $this->home_model->deletarConteudoHome($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Conteúdo não encontrado</div>');
        }

        $this->home_model->deletarConteudoHome($query->id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Conteúdo deletado com sucesso!</div>');
        redirect('home', 'refresh');
    }
}
