<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acesso_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function acesso($controlador, $id) {
        if($this->session->userdata('logged') == FALSE) { redirect(base_url()); }
        if($this->session->userdata('type') == "T") {
            if(!empty($id)) {            
                $tabela = ucfirst($controlador);
                $campo = $controlador."_id";
                $query = $this->db->get_where($tabela,
                    array($campo=>$id, 'docente_id'=>$this->session->userdata('id')));
                if(empty($query->row_array())) { 
                    $newdata = array(
                        'id'   =>'',
                        'name'  =>'',
                        'email'     => '',
                        'logged' => FALSE,
                        'type' => "0"
                    );
                    $this->session->unset_userdata($newdata);
                    $this->session->sess_destroy();
                    redirect(base_url()); 
                }
            }
        }
    }
}