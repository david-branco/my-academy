<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Artigo_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getArtigos() {
        $query = $this->db->query("SELECT * FROM Artigo ORDER BY data_data");
        return $query->result();
    }

    public function getArtigo($id) {
        $query = $this->db->get_where('Artigo',array('artigo_id'=>$id));
        return $query->row_array();
    }

    public function temArtigo($id_artigo) {
        $query = $this->db->get_where('Artigo',array('artigo_id'=>$id_artigo, 'docente_id'=>$this->session->userdata('id')));
        return $query->row_array();
    }

    public function inserir($id_artigo) {
    	$data=array(
    		'docente_id'=> $this->session->userdata('id'),
            'autores'=>$_POST['autores'],
            'titulo'=>$_POST['titulo'],
            'publicacao'=>$_POST['publicacao'],
            'volume'=>$_POST['volume'],
            'data_data'=>$_POST['data_data'],
            'editora'=>$_POST['editora'],
            'issn'=>$_POST['issn'],
            'urls'=>$_POST['urls'],
            'doi'=>$_POST['doi'],
            'visibilidade'=>$_POST['visibilidade']
        );
        
        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
		if ($id_artigo == FALSE) { $this->db->insert('Artigo',$data); }        
		else {
			$this->db->update('Artigo', $data, "artigo_id = $id_artigo");
		}  
    }

    public function apagar($id_artigo) {
        $this->db->delete('Artigo', array('artigo_id'=>$id_artigo));
    }

    public function enable_disable($id_artigo) {
        $artigo = $this->getArtigo($id_artigo);
        $this->db->update('Artigo', array('visibilidade' => abs($artigo['visibilidade'] -1)), array('artigo_id' => $id_artigo));
    }
}