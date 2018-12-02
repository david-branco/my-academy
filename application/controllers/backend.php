<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {

	function index() {
        if($this->session->userdata('logged') == FALSE) { redirect(base_url()); }
        
        $this->load->model("teacher_model");
		$this->load->model("comunicacao_model");
    	$id = $this->session->userdata('id');
    	$data['teacher'] = $this->teacher_model->getTeacher($id);
    	$data['classes'] = $this->teacher_model->getClassFromTeacher($id);
    	$data['events'] = $this->teacher_model->getEventsFromTeacher($id);
    	$data['supervisions'] = $this->teacher_model->getSupervisionsFromTeacher($id);
    	$data['exams'] = $this->teacher_model->getExamsFromTeacher($id);
    	$data['invs'] = $this->teacher_model->getInvestigationsFromTeacher($id);
    	$data['books'] = $this->teacher_model->getBooksFromTeacher($id);
    	$data['procedures'] = $this->teacher_model->getProceduresFromTeacher($id);
    	$data['articles'] = $this->teacher_model->getArticlesFromTeacher($id);
    	$data['manages'] = $this->teacher_model->getManagementsFromTeacher($id);
        $data['communications'] = $this->teacher_model->getCommunicationsFromTeacher($id);
    	$this->load->view('include/header');
    	$this->load->view('backend/index', $data);
    	$this->load->view('include/footer');
  	}

}