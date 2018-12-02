<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evento extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome", "Event Name", "required|xss_clean");
        $this->form_validation->set_rules("tipo_participacao", "Type of Participation", "required|xss_clean");
        $this->form_validation->set_rules("data_data", "Date", "xss_clean");
        $this->form_validation->set_rules("local", "Local", "required|xss_clean");
        $this->form_validation->set_rules("descricao", "Description", "xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");

        $this->load->model('evento_model');
        $this->load->model('teacher_model');
        $id_evento = $this->uri->segment(3);
        $dados = $this->evento_model->getEvento($id_evento);
        $dados['title'] = "Event";
        $dados['id_evento'] = $id_evento;
        $dados['docente_id'] = "";

        if ($id_evento == FALSE) {
            $dados['nome'] = "";
            $dados['tipo_participacao'] = "";
            $dados['data_data'] = "";
            $dados['local'] = "";
            $dados['descricao'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("evento/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $id = $this->evento_model->inserir($id_evento);
            $this->session->set_flashdata('mensagem', 'The Event was successfully saved');
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); } 
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("evento_model");
        $id = $this->uri->segment(3);
        $data['event'] = $this->evento_model->getEvento($id);
        $this->load->view("include/header");
        $this->load->view("evento/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_evento = $this->uri->segment(3);
        $this->load->model('evento_model');
        $this->evento_model->apagar($id_evento);;
        $this->session->set_flashdata('mensagem', 'The Event was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); } 
    }

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("evento_model");
        $this->evento_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Event was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}