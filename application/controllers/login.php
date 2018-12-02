<?php if (!defined('BASEPATH')) die();

class Login extends CI_Controller {

	function signin() {

		$this->load->model('teacher_model');
		$this->load->model('admin_model');
		$email = $this->input->post('email');
		$pass  = $this->input->post('password');

		if( $email && $pass && $this->teacher_model->validate_teacher($email,$pass)) {
			redirect('/index.php/backend/index');
		} else if($email && $pass && $this->admin_model->validate_admin($email,$pass)) {
			redirect('/index.php/admin');
		} else {
			redirect('/');
		}
	}

	function signout() {

		$newdata = array(
			'id'   =>'',
			'name'  =>'',
			'email'     => '',
			'logged' => FALSE,
			'type' => "0"
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect("/");
		}
	}

?>