<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {

	
    public function search() {

        if ( !isset($_GET['term']) )
            exit;
        $term = $_REQUEST['term'];
        $term = strtoupper($term);
        $data = array();
        $this->load->model("teacher_model");
        $rows = $this->teacher_model->getTeacherSearch($term);
        foreach( $rows as $row ) {
            $data[] = array(
                'label' => $row->nome,
                'value' => $row->docente_id);
        }

        echo json_encode($data);
        flush();
    }
	
    function profile() {
		$this->load->model("teacher_model");
        $this->load->model("exame_model");
		$id = $this->uri->segment(3);
		$teacher = $this->teacher_model->getTeacherByShort($id);
        if ( empty($teacher) ) {
            $teacher = $this->teacher_model->getTeacher($id);
        }
        $id = $teacher['docente_id'];
        $data['teacher'] = $teacher;
		$data['classes'] = $this->teacher_model->getPublicClassFromTeacher($id);
		$data['events'] = $this->teacher_model->getPublicEventsFromTeacher($id);
		$data['sups'] = $this->teacher_model->getPublicSupervisionsFromTeacher($id);
        $data['exams'] = $this->teacher_model->getPublicExamsFromTeacher($id);
		$data['invs'] = $this->teacher_model->getPublicInvestigationsFromTeacher($id);
		$data['books'] = $this->teacher_model->getPublicBooksFromTeacher($id);
        $data['procs'] = $this->teacher_model->getPublicProceduresFromTeacher($id);
        $data['arts'] = $this->teacher_model->getPublicArticlesFromTeacher($id);
        $data['manages'] = $this->teacher_model->getPublicManagementsFromTeacher($id);
		$data['communications'] = $this->teacher_model->getPublicCommunicationsFromTeacher($id);
		$this->load->view('include/headerPublic');
		$this->load->view('profile', $data);
		$this->load->view('include/footer');
	}

    public function form() {

        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome", "Full Name", "letras_espacos|required|xss_clean");
        $this->form_validation->set_rules("password", "Password", "min_length[4]|max_length[12]|required|xss_clean");
        $this->form_validation->set_rules("confpassword", "Password confirmation", "matches[password]|required|[xss_clean");
        $this->form_validation->set_rules("email", "Email", "required|valid_email|email_unico[Docente.email]|xss_clean");
        $this->form_validation->set_rules("website", "Website", "valid_url|xss_clean");
        $this->form_validation->set_rules("contato", "Contact", "xss_clean");
        $this->form_validation->set_rules("info_pessoal", "Personal Information", "xss_clean");
        $this->form_validation->set_rules("info_academica", "Academic Background", "xss_clean");
        $this->form_validation->set_rules("info_hobbies", "Personal Hobbies", "xss_clean");

        $this->load->model('teacher_model');
        $id_docente = $this->uri->segment(3);
        $dados = $this->teacher_model->getTeacher($id_docente);
        $dados['title'] = "User";        
        $dados['id_docente'] = $id_docente;

        if ($id_docente == FALSE) {
            $dados['nome'] = "";
            $dados['password'] = "";
            $dados['email'] = "";
            $dados['website'] = "";
            $dados['contato'] = "";
            $dados['info_pessoal'] = "";
            $dados['info_academica'] = "";
            $dados['info_hobbies'] = "";
        }

        if($this->form_validation->run() == FALSE) {
        	$dados['erros_upload'] = "";
            $this->load->view("include/header");
            $this->load->view("teacher/form", $dados);
            $this->load->view("include/footer");
        } 
        else {
        	if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {

                $config['upload_path'] = './uploads/photos/teacher/';                
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';
                $config['overwrite'] = TRUE;
                $config['file_name'] = "teacherphoto".$id_docente.".jpg";

                $this->load->library('upload', $config);
                $field_name = "foto";

                if (!$this->upload->do_upload($field_name)) {
                    $dados['erros_upload'] = $this->upload->display_errors();
                    $this->load->view("include/header");
		            $this->load->view("teacher/form", $dados);
		            $this->load->view("include/footer");            
                } 
            }

        	$id = $this->teacher_model->inserir($id_docente);
            if($id != $id_docente) { 
                $this->session->set_flashdata('mensagem', 'Welcome !!');
                $this->session->set_userdata( 
                    array(
                        'id'=>$id,
                        'email'=>$_REQUEST['email'],
                        'logged' => TRUE
                    )
                );
            }
            else { $this->session->set_flashdata('mensagem', 'Your Profile was successfully saved'); }
    	    if($this->session->userdata('type') == 'A') { 
                $this->session->set_flashdata('mensagem', 'New User was successfully saved');
                redirect(base_url()."index.php/admin"); 
            }
            else { redirect(base_url()."index.php/backend"); }             
        }   
    }

    public function delete() {
        if($this->session->userdata('type') != 'A') { redirect(base_url()); }

        $id_teacher = $this->uri->segment(3);
        $this->load->model('teacher_model');
        $this->teacher_model->apagar($id_teacher);
        $this->session->set_flashdata('mensagem', 'The Teacher was successfully deleted');
        redirect(base_url()."index.php/admin"); 
    }

}