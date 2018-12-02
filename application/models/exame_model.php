<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Exame_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getExames() {
        $query = $this->db->query("SELECT * FROM Exame");
        return $query->result();
    }

    public function getExame($id) {
        $query = $this->db->get_where('Exame',array('exame_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_exame) {
    	$data=array(
    		'docente_id'=> $this->session->userdata('id'),
            'tipo'=>$_POST['tipo'],
            'nome_estudante'=>$_POST['nome_estudante'],
            'id_estudante'=>$_POST['id_estudante'],
            'titulo'=>$_POST['titulo'],
            'tese_url'=>$_POST['tese_url'],
            'instituicao'=>$_POST['instituicao'],
            'data_exame'=>$_POST['data_exame'],
            'visibilidade'=>$_POST['visibilidade']
        );

        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
		if ($id_exame == FALSE) { $this->db->insert('Exame',$data); }        
		else {
			$this->db->update('Exame', $data, "exame_id = $id_exame");
		}    
    }

    public function apagar($id_exame) {
        $this->db->delete('Exame', array('exame_id'=>$id_exame));
    }

    public function showExameType($n) {
        return (($n==1)? "PhD":
            (($n==2)? "MsC" : "Other"));
    }

    public function enable_disable($id_exame) {
        $exame = $this->getExame($id_exame);
        $this->db->update('Exame', array('visibilidade' => abs($exame['visibilidade'] -1)), array('exame_id' => $id_exame));
    }
}
