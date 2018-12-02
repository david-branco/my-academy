<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Ensino_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getEnsinos() {
        $query = $this->db->query("SELECT * FROM Ensino ORDER BY periodo");
        return $query->result();
    }

    public function getEnsino($id) {
        $query = $this->db->get_where('Ensino',array('ensino_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_ensino) {
    	$data=array(
    		'docente_id'=> $this->session->userdata('id'),
            'nome'=>$_POST['nome'],
            'periodo'=>$_POST['periodo'],
            'instituicao'=>$_POST['instituicao'],
            'curso'=>$_POST['curso'],
            'nalunos'=>$_POST['nalunos'],
            'visibilidade'=>$_POST['visibilidade']
        );

        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
		if ($id_ensino == FALSE) { $this->db->insert('Ensino',$data); }        
		else {
			$this->db->update('Ensino', $data, "ensino_id = $id_ensino");
		}   
    }

    public function apagar($id_ensino) {
        $this->db->delete('Ensino', array('ensino_id'=>$id_ensino));
    }

    public function enable_disable($id_ensino) {
        $ensino = $this->getEnsino($id_ensino);
        $this->db->update('Ensino', array('visibilidade' => abs($ensino['visibilidade'] -1)), array('ensino_id' => $id_ensino));
    }
}