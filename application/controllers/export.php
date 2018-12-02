<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {


    public function pubsToBibtex() {
        if($this->session->userdata('logged') == FALSE) { redirect(base_url()); }

	    $this->load->model('teacher_model');
	    $this->load->model('export_model');
	    $this->load->helper('file');
	    $this->load->helper('download');

    	$path = $this->export_model->pubsToBibtex();
    	$ficheiro = file_get_contents(base_url().$path);
    	force_download("pubs.bib", $ficheiro);
    }

    public function pubsToPdf() {
        if($this->session->userdata('logged') == FALSE) { redirect(base_url()); }
    	//É preciso ter permissões para executar em sudo e ter latex, bibtex ,dvips e ps2pdf instalados
    	//Abrir sudo visudo no terminal e acrescentar no final : www-data ALL=NOPASSWD: ALL
        $this->load->model('teacher_model');
        $this->load->model('export_model');
        $this->load->helper('file');
        $this->load->helper('download');

        $this->export_model->pubsToPdf();
    	$path = $this->export_model->pubsToPdf();
        $this->export_model->push_file($path, "pubs.pdf");
    }
}
