<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Comunicacao_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getComunicacoes() {
        $query = $this->db->query("SELECT * FROM Comunicacao ORDER BY data_data");
        return $query->result();
    }

    public function getComunicacao($id) {
        $query = $this->db->get_where('Comunicacao',array('comunicacao_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_comunicacao) {
        $data=array(
            'docente_id'=> $this->session->userdata('id'),
            'tipo'=>$_POST['tipo'],
            'autores'=>$_POST['autores'],
            'titulo'=>$_POST['titulo'],
            'evento'=>$_POST['evento'],
            'local'=>$_POST['local'],
            'data_data'=>$_POST['data_data'],
            'url'=>$_POST['url'],
            'visibilidade'=>$_POST['visibilidade']
        );
        
        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
        if ($id_comunicacao == FALSE) { $this->db->insert('Comunicacao',$data); }        
        else {
            $this->db->update('Comunicacao', $data, "comunicacao_id = $id_comunicacao");
        } 
    }

    public function apagar($id_comunicacao) {
        $this->db->delete('Comunicacao', array('comunicacao_id'=>$id_comunicacao));
    }

    public function showType($n) {
        return (($n==1)? "Talk":
            (($n==2)? "Communication" : 
                (($n==3)? "Seminar":"Other")));
    }

    public function enable_disable($id_comunicacao) {
        $comunicacao = $this->getComunicacao($id_comunicacao);
        $this->db->update('Comunicacao', array('visibilidade' => abs($comunicacao['visibilidade'] -1)), array('comunicacao_id' => $id_comunicacao));
    }
}