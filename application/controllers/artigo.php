<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artigo extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("autores", "Authors", "letras_espacos_virgulas|required|xss_clean");
        $this->form_validation->set_rules("titulo", "Title", "required|xss_clean");
        $this->form_validation->set_rules("publicacao", "Journal", "required|xss_clean");
        $this->form_validation->set_rules("volume", "Volume", "xss_clean");
        $this->form_validation->set_rules("data_data", "Date", "xss_clean");
        $this->form_validation->set_rules("editora", "Publisher", "xss_clean");
        $this->form_validation->set_rules("issn", "ISSN", "valid_issn|xss_clean");
        $this->form_validation->set_rules("urls", "Deliverables URLs", "valid_url|xss_clean");
        $this->form_validation->set_rules("doi", "DOI", "valid_url|xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");

        $this->load->model('artigo_model');
        $this->load->model('teacher_model');
        $id_artigo = $this->uri->segment(3);
        $dados = $this->artigo_model->getArtigo($id_artigo);
        $dados['title'] = "Article";
        $dados['id_artigo'] = $id_artigo;
        $dados['docente_id'] = "";

        if ($id_artigo == FALSE) {
            $dados['autores'] = "";
            $dados['titulo'] = "";
            $dados['publicacao'] = "";
            $dados['volume'] = "";
            $dados['data_data'] = "";
            $dados['editora'] = "";
            $dados['issn'] = "";
            $dados['urls'] = "";
            $dados['doi'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("artigo/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $this->artigo_model->inserir($id_artigo);
            $this->session->set_flashdata('mensagem', 'The Article was successfully saved');
            if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
            else { redirect(base_url()."index.php/backend"); }  
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

    	$this->load->model('teacher_model');
        $this->load->model("artigo_model");
        $id = $this->uri->segment(3);
        $data['artigo'] = $this->artigo_model->getArtigo($id);
        $this->load->view("include/header");
        $this->load->view("artigo/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
    	$this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
    	
        $id_artigo = $this->uri->segment(3);
        $this->load->model('artigo_model');
        $this->artigo_model->apagar($id_artigo);
        $this->session->set_flashdata('mensagem', 'The Article was successfully deleted');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); } 
    }

    public function enable_disable() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id = $this->uri->segment(3);
        $this->load->model("artigo_model");
        $this->artigo_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Article was successfully changed');
        if($this->session->userdata('type') == 'A') { redirect(base_url()."index.php/admin"); }
        else { redirect(base_url()."index.php/backend"); }
    }
}