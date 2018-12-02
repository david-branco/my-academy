<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Gestao_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getGestoes() {
        $query = $this->db->query("SELECT * FROM Gestao ORDER BY periodo");
        return $query->result();
    }

    public function getGestao($id) {
        $query = $this->db->get_where('Gestao',array('gestao_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_gestao) {
        $data=array(
            'docente_id'=> $this->session->userdata('id'),
            'instituicao'=>$_POST['instituicao'],
            'cargo'=>$_POST['cargo'],
            'referente'=>$_POST['referente'],
            'periodo'=>$_POST['periodo'],
            'descricao'=>$_POST['descricao'],
            'visibilidade'=>$_POST['visibilidade']
        );

        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
        if ($id_gestao == FALSE) { $this->db->insert('Gestao',$data); }        
        else {
            $this->db->update('Gestao', $data, "gestao_id = $id_gestao");
        } 
    }

    public function apagar($id_gestao) {
        $this->db->delete('Gestao', array('gestao_id'=>$id_gestao));
    }

    public function enable_disable($id_gestao) {
        $gestao = $this->getGestao($id_gestao);
        $this->db->update('Gestao', array('visibilidade' => abs($gestao['visibilidade'] -1)), array('gestao_id' => $id_gestao));
    }
}