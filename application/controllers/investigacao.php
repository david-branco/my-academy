<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Investigacao extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome", "Name", "required|xss_clean");
        $this->form_validation->set_rules("periodo", "Period", "required|xss_clean");
        $this->form_validation->set_rules("descricao", "Description", "required|xss_clean");
        $this->form_validation->set_rules("sites_relacionados", "Related Sites", "valid_url|required|xss_clean");
        $this->form_validation->set_rules("publicacoes", "Publications URL", "valid_url|xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");

        $this->load->model('investigacao_model');
        $this->load->model('teacher_model');
        $id_investigacao = $this->uri->segment(3);
        $dados = $this->investigacao_model->getInvestigacao($id_investigacao);
        $dados['title'] = "Investigation";
        $dados['id_investigacao'] = $id_investigacao;
        $dados['docente_id'] = "";

        if ($id_investigacao == FALSE) {
            $dados['nome'] = "";
            $dados['periodo'] = "";  
            $dados['descricao'] = "";  
            $dados['sites_relacionados'] = "";   
            $dados['publicacoes'] = ""; 
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("investigacao/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $id = $this->investigacao_model->inserir($id_investigacao);
            $this->session->set_flashdata('mensagem', 'The Investigation was successfully saved');
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); } 
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("investigacao_model");
        $id = $this->uri->segment(3);
        $data['inv'] = $this->investigacao_model->getInvestigacao($id);
        $this->load->view("include/header");
        $this->load->view("investigacao/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_investigacao = $this->uri->segment(3);
        $this->load->model('investigacao_model');
        $this->investigacao_model->apagar($id_investigacao);;
        $this->session->set_flashdata('mensagem', 'The Investigation was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); } 
    }

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("investigacao_model");
        $this->investigacao_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Investigation was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}