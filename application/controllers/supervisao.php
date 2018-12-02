<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supervisao extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("estado", "Status", "required|xss_clean");
        $this->form_validation->set_rules("tipo", "Degree", "required|xss_clean");
        $this->form_validation->set_rules("local", "Local", "xss_clean");
        $this->form_validation->set_rules("nome_estudante", "Student Name", "letras_espacos|required|xss_clean");
        $this->form_validation->set_rules("descricao", "Program Description", "xss_clean");
        $this->form_validation->set_rules("endereco", "Program Address", "xss_clean");
        $this->form_validation->set_rules("titulo", "Title", "required|xss_clean");
        $this->form_validation->set_rules("doi", "DOI", "valid_url|xss_clean");
        $this->form_validation->set_rules("nome_coadjuvante", "Co-Supervisor Name", "letras_espacos|xss_clean");
        $this->form_validation->set_rules("instituicao_coadjuvante", "Co-Supervisor Instituition", "xss_clean");
        $this->form_validation->set_rules("data_inicial", "Begin Date", "xss_clean");
        $this->form_validation->set_rules("data_final", "End Date", "data_depois[data_inicial]|xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");

        $this->load->model('supervisao_model');
        $this->load->model('teacher_model');
        $id_supervisao = $this->uri->segment(3);
        $dados = $this->supervisao_model->getSupervisao($id_supervisao);
        $dados['title'] = "Thesis Supervision";
        $dados['id_supervisao'] = $id_supervisao;
        $dados['docente_id'] = "";

        if ($id_supervisao == FALSE) {
            $dados['estado'] = "";
            $dados['tipo'] = "";
            $dados['local'] = "";
            $dados['nome_estudante'] = "";
            $dados['descricao'] = "";
            $dados['endereco'] = "";
            $dados['titulo'] = "";
            $dados['doi'] = "";
            $dados['nome_coadjuvante'] = "";
            $dados['instituicao_coadjuvante'] = "";
            $dados['data_inicial'] = "";
            $dados['data_final'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("supervisao/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $id = $this->supervisao_model->inserir($id_supervisao);
            $this->session->set_flashdata('mensagem', 'The Thesis Supervision was successfully saved');
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); }   
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("supervisao_model");
        $id = $this->uri->segment(3);
        $data['sup'] = $this->supervisao_model->getSupervisao($id);
        $this->load->view("include/header");
        $this->load->view("supervisao/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_supervisao = $this->uri->segment(3);
        $this->load->model('supervisao_model');
        $this->supervisao_model->apagar($id_supervisao);;
        $this->session->set_flashdata('mensagem', 'The Thesis Supervision was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); } 
    }    

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("supervisao_model");
        $this->supervisao_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Thesis Supervision was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}