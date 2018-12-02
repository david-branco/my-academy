<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestao extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("instituicao", "Institution", "required|xss_clean");
        $this->form_validation->set_rules("cargo", "Role", "required|xss_clean");
        $this->form_validation->set_rules("referente", "Of", "required|xss_clean");
        $this->form_validation->set_rules("periodo", "Period", "required|xss_clean");
        $this->form_validation->set_rules("descricao", "Description", "xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");

        $this->load->model('gestao_model');
        $this->load->model('teacher_model');
        $id_gestao = $this->uri->segment(3);
        $dados = $this->gestao_model->getGestao($id_gestao);
        $dados['title'] = "Management";
        $dados['id_gestao'] = $id_gestao;
        $dados['docente_id'] = "";

        if ($id_gestao == FALSE) {
            $dados['instituicao'] = "";
            $dados['cargo'] = "";
            $dados['referente'] = "";
            $dados['periodo'] = "";
            $dados['descricao'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("gestao/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $id = $this->gestao_model->inserir($id_gestao);
            $this->session->set_flashdata('mensagem', 'The Management was successfully saved');
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); }  
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("gestao_model");
        $id = $this->uri->segment(3);
        $data['manage'] = $this->gestao_model->getGestao($id);
        $this->load->view("include/header");
        $this->load->view("gestao/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_gestao = $this->uri->segment(3);
        $this->load->model('gestao_model');
        $this->gestao_model->apagar($id_gestao);;
        $this->session->set_flashdata('mensagem', 'The Management was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("gestao_model");
        $this->gestao_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Management was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}