<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ensino extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome", "Class Name", "required|xss_clean");
        $this->form_validation->set_rules("periodo", "Period", "required|xss_clean");
        $this->form_validation->set_rules("instituicao", "Institution", "required|xss_clean");
        $this->form_validation->set_rules("curso", "Course", "xss_clean");
        $this->form_validation->set_rules("nalunos", "Number of Students", "numeric|xss_clean");
        $this->form_validation->set_rules("url", "Class Webpage", "valid_url|xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");

        $this->load->model('ensino_model');
        $this->load->model('teacher_model');
        $id_ensino = $this->uri->segment(3);
        $dados = $this->ensino_model->getEnsino($id_ensino);
        $dados['title'] = "Class";
        $dados['id_ensino'] = $id_ensino;
        $dados['docente_id'] = "";

        if ($id_ensino == FALSE) {
            $dados['nome'] = "";
            $dados['periodo'] = "";  
            $dados['instituicao'] = "";  
            $dados['curso'] = "";   
            $dados['nalunos'] = ""; 
            $dados['url'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("ensino/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $id = $this->ensino_model->inserir($id_ensino);
            $this->session->set_flashdata('mensagem', 'The Class was successfully saved');            
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); }   
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("ensino_model");
        $id = $this->uri->segment(3);
        $data['class'] = $this->ensino_model->getEnsino($id);
        $this->load->view("include/header");
        $this->load->view("ensino/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_ensino = $this->uri->segment(3);
        $this->load->model('ensino_model');
        $this->ensino_model->apagar($id_ensino);
        $this->session->set_flashdata('mensagem', 'The Class was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("ensino_model");
        $this->ensino_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Class was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}