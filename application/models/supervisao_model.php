<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Supervisao_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getSupervisoes() {
        $query = $this->db->query("SELECT * FROM Supervisao");
        return $query->result();
    }

    public function getSupervisao($id) {
        $query = $this->db->get_where('Supervisao',array('supervisao_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_supervisao) {
    	$data=array(
    		'docente_id'=> $this->session->userdata('id'),
            'estado'=>$_POST['estado'],
            'tipo'=>$_POST['tipo'],
            'local'=>$_POST['local'],
            'nome_estudante'=>$_POST['nome_estudante'],
            'descricao'=>$_POST['descricao'],
            'endereco'=>$_POST['endereco'],
            'titulo'=>$_POST['titulo'],
            'doi'=>$_POST['doi'],
            'nome_coadjuvante'=>$_POST['nome_coadjuvante'],
            'instituicao_coadjuvante'=>$_POST['instituicao_coadjuvante'],
            'data_inicial'=>$_POST['data_inicial'],
            'data_final'=>$_POST['data_final'],
            'visibilidade'=>$_POST['visibilidade']
        );
 
        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
		if ($id_supervisao == FALSE) { $this->db->insert('Supervisao',$data); }        
		else {
			$this->db->update('Supervisao', $data, "supervisao_id = $id_supervisao");
		}  
    }

    public function apagar($id_supervisao) {
        $this->db->delete('Supervisao', array('supervisao_id'=>$id_supervisao));
    }

    public function showExameType($n) {
        return (($n==1)? "PhD":
            (($n==2)? "MsC" : "Other"));
    }

    public function showSupervisionStatus($n) {
        return (($n==1)? "Undergoing":
            (($n==2)? "Concluded" : "Other"));
    }

    public function enable_disable($id_supervisao) {
        $supervisao = $this->getSupervisao($id_supervisao);
        $this->db->update('Supervisao', array('visibilidade' => abs($supervisao['visibilidade'] -1)), array('supervisao_id' => $id_supervisao));
    }
}