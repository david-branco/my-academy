<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Procedimento extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("autores", "Authors", "letras_espacos_virgulas|required|xss_clean");
        $this->form_validation->set_rules("local", "Local", "xss_clean");
        $this->form_validation->set_rules("titulo", "Title", "required|xss_clean");
        $this->form_validation->set_rules("titulo_livro", "Book Title", "xss_clean");
        $this->form_validation->set_rules("data_data", "Date", "xss_clean");
        $this->form_validation->set_rules("urls", "Deliverables URL", "valid_url|xss_clean");
        $this->form_validation->set_rules("isbn", "ISBN", "valid_isbn|xss_clean");
        $this->form_validation->set_rules("doi", "DOI", "valid_url|xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");

        $this->load->model('procedimento_model');
        $id_procedimento = $this->uri->segment(3);
        $dados = $this->procedimento_model->getProcedimento($id_procedimento);
        $dados['title'] = "Proceeding";
        $dados['id_procedimento'] = $id_procedimento;

        if ($id_procedimento == FALSE) {
            $dados['autores'] = "";
            $dados['local'] = "";
            $dados['titulo'] = "";
            $dados['titulo_livro'] = "";
            $dados['data_data'] = "";
            $dados['urls'] = "";
            $dados['isbn'] = "";
            $dados['doi'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("procedimento/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $id = $this->procedimento_model->inserir($id_procedimento);
            $this->session->set_flashdata('mensagem', 'The Proceeding was successfully saved');
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); } 
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("procedimento_model");
        $id = $this->uri->segment(3);
        $data['proc'] = $this->procedimento_model->getProcedimento($id);
        $this->load->view("include/header");
        $this->load->view("procedimento/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_procedimento = $this->uri->segment(3);
        $this->load->model('procedimento_model');
        $this->procedimento_model->apagar($id_procedimento);;
        $this->session->set_flashdata('mensagem', 'The Proceeding was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); } 
    }

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("procedimento_model");
        $this->procedimento_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Proceeding was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}