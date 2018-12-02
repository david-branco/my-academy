<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Evento_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getEventos() {
        $query = $this->db->query("SELECT * FROM Evento ORDER BY data_data");
        return $query->result();
    }

    public function getEvento($id) {
        $query = $this->db->get_where('Evento',array('evento_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_evento) {
    	$data=array(
    		'docente_id'=> $this->session->userdata('id'),
            'nome'=>$_POST['nome'],
            'tipo_participacao'=>$_POST['tipo_participacao'],
            'data_data'=>$_POST['data_data'],
            'local'=>$_POST['local'],
            'descricao'=>$_POST['descricao'],
            'visibilidade'=>$_POST['visibilidade']
        );

        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
		if ($id_evento == FALSE) { $this->db->insert('Evento',$data); }        
		else {
			$this->db->update('Evento', $data, "evento_id = $id_evento");
		}   
    }

    public function apagar($id_evento) {
        $this->db->delete('Evento', array('evento_id'=>$id_evento));
    }

    public function enable_disable($id_evento) {
        $evento = $this->getEvento($id_evento);
        $this->db->update('Evento', array('visibilidade' => abs($evento['visibilidade'] -1)), array('evento_id' => $id_evento));
    }
}