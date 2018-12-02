<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Livro extends CI_Controller {

    public function form() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("autores", "Authors", "letras_espacos_virgulas|required|xss_clean");
        $this->form_validation->set_rules("editores", "Editors", "letras_espacos_virgulas|xss_clean");
        $this->form_validation->set_rules("titulo", "Title", "required|xss_clean");
        $this->form_validation->set_rules("capitulo", "Chapters", "xss_clean");
        $this->form_validation->set_rules("paginas", "Pages", "xss_clean");
        $this->form_validation->set_rules("editora", "Publisher", "required|xss_clean");
        $this->form_validation->set_rules("data_data", "Date", "xss_clean");
        $this->form_validation->set_rules("volume", "Volume", "xss_clean");
        $this->form_validation->set_rules("isbn", "ISBN", "valid_isbn|xss_clean");
        $this->form_validation->set_rules("doi", "DOI", "valid_url|xss_clean");
        $this->form_validation->set_rules("visibilidade", "Visibility", "required|xss_clean");


        $this->load->model('livro_model');
        $this->load->model('teacher_model');
        $id_livro = $this->uri->segment(3);
        $dados = $this->livro_model->getLivro($id_livro);
        $dados['title'] = "Book";
        $dados['id_livro'] = $id_livro;
        $dados['docente_id'] = "";

        if ($id_livro == FALSE) {
            $dados['autores'] = "";
            $dados['editores'] = "";
            $dados['titulo'] = "";
            $dados['capitulo'] = "";
            $dados['paginas'] = "";
            $dados['editora'] = "";
            $dados['data_data'] = "";
            $dados['volume'] = "";
            $dados['isbn'] = "";
            $dados['doi'] = "";
            $dados['visibilidade'] = "1";
        }

        if($this->form_validation->run() == FALSE) {         
            $this->load->view("include/header");
            $this->load->view("livro/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
            $id = $this->livro_model->inserir($id_livro);
            $this->session->set_flashdata('mensagem', 'The Book was successfully saved');
            redirect(base_url()."index.php/backend");  
        }
    }

    public function show () {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));

        $this->load->model('teacher_model');
        $this->load->model("livro_model");
        $id = $this->uri->segment(3);
        $data['book'] = $this->livro_model->getLivro($id);
        $this->load->view("include/header");
        $this->load->view("livro/show", $data);
        $this->load->view("include/footer");
    }

    public function delete() {
        $this->load->model('acesso_model');
        $this->acesso_model->acesso($this->router->fetch_class(), $this->uri->segment(3));
        
        $id_livro = $this->uri->segment(3);
        $this->load->model('livro_model');
        $this->livro_model->apagar($id_livro);;
        $this->session->set_flashdata('mensagem', 'The Book was successfully deleted');
        redirect(base_url()."index.php/backend");
    }

    public function enable_disable() {
        $id = $this->uri->segment(3);
        $this->load->model("livro_model");
        $this->livro_model->enable_disable($id);

        $this->session->set_flashdata('mensagem', 'The Visibility of the Book was successfully changed');
        redirect(base_url()."index.php/backend");
    }
}