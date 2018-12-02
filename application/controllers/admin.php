<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index() {
        if($this->session->userdata('type') != 'A') { redirect(base_url()); }   
             
        $this->load->model("teacher_model");
        $this->load->model("ensino_model");
        $this->load->model("evento_model");
        $this->load->model("supervisao_model");
        $this->load->model("exame_model");
        $this->load->model("investigacao_model");
        $this->load->model("livro_model");
        $this->load->model("procedimento_model");
        $this->load->model("artigo_model");
        $this->load->model("gestao_model");
        $this->load->model("comunicacao_model");
        $dados['docentes'] = $this->teacher_model->getTeachers();
        $dados['classes'] = $this->ensino_model->getEnsinos();
        $dados['events'] = $this->evento_model->getEventos();
        $dados['supervisions'] = $this->supervisao_model->getSupervisoes();
        $dados['exams'] = $this->exame_model->getExames();
        $dados['invs'] = $this->investigacao_model->getInvestigacoes();
        $dados['books'] = $this->livro_model->getLivros();
        $dados['procedures'] = $this->procedimento_model->getProcedimentos();
        $dados['articles'] = $this->artigo_model->getArtigos();
        $dados['manages'] = $this->gestao_model->getGestoes();
        $dados['communications'] = $this->comunicacao_model->getComunicacoes();
        $this->load->view('include/header');
        $this->load->view('frontend/admin', $dados);
        $this->load->view('include/footer');
    }

}
