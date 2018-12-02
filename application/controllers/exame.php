<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exame extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("tipo", "Degree", "required|xss_clean");
        $this->form_validation->set_rules("nome_estudante", "Student Name", "letras_espacos|required|xss_clean");
        $this->form_validation->set_rules("id_estudante", "Student identifier", "xss_clean");
        $this->form_validation->set_rules("titulo", "Title", "required|xss_clean");
        $this->form_validation->set_rules("tese_url", "Thesis URL", "valid_url|xss_clean");
        $this->form_validation->set_rules("instituicao", "Institution", "required|xss_clean");
        $this->form_validation->set_rules("data_exame", "Date", "required|xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");
       
        $this->load->model('exame_model');
        $this->load->model('teacher_model');
        $id_exame = $this->uri->segment(3);
        $dados = $this->exame_model->getExame($id_exame);
        $dados['title'] = "Thesis Examination";
        $dados['id_exame'] = $id_exame;
        $dados['docente_id'] = "";

        if ($id_exame == FALSE) {
            $dados['tipo'] = "";
            $dados['nome_estudante'] = "";
            $dados['id_estudante'] = "";
            $dados['titulo'] = "";
            $dados['tese_url'] = "";
            $dados['instituicao'] = "";
            $dados['data_exame'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {        
            $this->load->view("include/header");
            $this->load->view("exame/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $id = $this->exame_model->inserir($id_exame);
            $this->session->set_flashdata('mensagem', 'The Thesis Examination was successfully saved');
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); }  
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("exame_model");
        $id = $this->uri->segment(3);
        $data['exam'] = $this->exame_model->getExame($id);
        $this->load->view("include/header");
        $this->load->view("exame/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_exame = $this->uri->segment(3);
        $this->load->model('exame_model');
        $this->exame_model->apagar($id_exame);;
        $this->session->set_flashdata('mensagem', 'The Thesis Examination was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); } 
    }

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("exame_model");
        $this->exame_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Thesis Examination was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}