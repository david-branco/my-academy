<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Investigacao_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getInvestigacoes() {
        $query = $this->db->query("SELECT * FROM Investigacao ORDER BY periodo");
        return $query->result();
    }

    public function getInvestigacao($id) {
        $query = $this->db->get_where('Investigacao',array('investigacao_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_investigacao) {
    	$data=array(
    		'docente_id'=> $this->session->userdata('id'),
            'nome'=>$_POST['nome'],
            'periodo'=>$_POST['periodo'],
            'descricao'=>$_POST['descricao'],
            'sites_relacionados'=>$_POST['sites_relacionados'],
            'publicacoes'=>$_POST['publicacoes'],
            'visibilidade'=>$_POST['visibilidade']
        );

        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
		if ($id_investigacao == FALSE) { $this->db->insert('Investigacao',$data); }        
		else {
			$this->db->update('Investigacao', $data, "investigacao_id = $id_investigacao");
		}
    }

    public function apagar($id_investigacao) {
        $this->db->delete('Investigacao', array('investigacao_id'=>$id_investigacao));
    }

    public function enable_disable($id_investigacao) {
        $investigacao = $this->getInvestigacao($id_investigacao);
        $this->db->update('Investigacao', array('visibilidade' => abs($investigacao['visibilidade'] -1)), array('investigacao_id' => $id_investigacao));
    }
}