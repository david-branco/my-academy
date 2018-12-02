<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunicacao extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("tipo", "Type", "required|xss_clean");
        $this->form_validation->set_rules("autores", "Authors", "letras_espacos_virgulas|required|xss_clean");
        $this->form_validation->set_rules("titulo", "Title", "required|xss_clean");
        $this->form_validation->set_rules("evento", "Event", "xss_clean");
        $this->form_validation->set_rules("local", "Local", "xss_clean");
        $this->form_validation->set_rules("data_data", "Date", "xss_clean");
        $this->form_validation->set_rules("url", "Communication URL", "valid_url|xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");

        $this->load->model('comunicacao_model');
        $this->load->model('teacher_model');
        $id_comunicacao = $this->uri->segment(3);
        $dados = $this->comunicacao_model->getComunicacao($id_comunicacao);
        $dados['title'] = "Communication";
        $dados['id_comunicacao'] = $id_comunicacao;
        $dados['docente_id'] = "";

        if ($id_comunicacao == FALSE) {
            $dados['tipo'] = "";
            $dados['autores'] = "";
            $dados['titulo'] = "";
            $dados['evento'] = "";
            $dados['local'] = "";
            $dados['data_data'] = "";
            $dados['url'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("comunicacao/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $this->comunicacao_model->inserir($id_comunicacao);
            $this->session->set_flashdata('mensagem', 'The Communication was successfully saved');
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); } 
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("comunicacao_model");
        $id = $this->uri->segment(3);
        $data['comunicacao'] = $this->comunicacao_model->getComunicacao($id);
        $this->load->view("include/header");
        $this->load->view("comunicacao/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_comunicacao = $this->uri->segment(3);
        $this->load->model('comunicacao_model');
        $this->comunicacao_model->apagar($id_comunicacao);;
        $this->session->set_flashdata('mensagem', 'The Communication was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); } 
    }

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("comunicacao_model");
        $this->comunicacao_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Communication was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}