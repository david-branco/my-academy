<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Procedimento_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getProcedimentos() {
        $query = $this->db->query("SELECT * FROM Procedimento ORDER BY data_data");
        return $query->result();
    }

    public function getProcedimento($id) {
        $query = $this->db->get_where('Procedimento',array('procedimento_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_procedimento) {
        $data=array(
            'docente_id'=> $this->session->userdata('id'),
            'autores'=>$_POST['autores'],
            'local'=>$_POST['local'],
            'titulo'=>$_POST['titulo'],
            'titulo_livro'=>$_POST['titulo_livro'],
            'data_data'=>$_POST['data_data'],
            'urls'=>$_POST['urls'],
            'isbn'=>$_POST['isbn'],
            'doi'=>$_POST['doi'],
            'visibilidade'=>$_POST['visibilidade']
        );

        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
        if ($id_procedimento == FALSE) { $this->db->insert('Procedimento',$data); }        
        else {
            $this->db->update('Procedimento', $data, "procedimento_id = $id_procedimento");
        }
    }

    public function apagar($id_procedimento) {
        $this->db->delete('Procedimento', array('procedimento_id'=>$id_procedimento));
    }

    public function enable_disable($id_procedimento) {
        $procedimento = $this->getProcedimento($id_procedimento);
        $this->db->update('Procedimento', array('visibilidade' => abs($procedimento['visibilidade'] -1)), array('procedimento_id' => $id_procedimento));
    }
}