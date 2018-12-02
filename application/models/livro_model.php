<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Livro_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getLivros() {
        $query = $this->db->query("SELECT * FROM Livro ORDER BY data_data");
        return $query->result();
    }

    public function getLivro($id) {
        $query = $this->db->get_where('Livro',array('livro_id'=>$id));
        return $query->row_array();
    }

    public function inserir($id_livro) {
        $data=array(
            'docente_id'=> $this->session->userdata('id'),
            'autores'=>$_POST['autores'],
            'editores'=>$_POST['editores'],
            'titulo'=>$_POST['titulo'],
            'capitulo'=>$_POST['capitulo'],
            'paginas'=>$_POST['paginas'],
            'editora'=>$_POST['editora'],
            'data_data'=>$_POST['data_data'],
            'volume'=>$_POST['volume'],
            'isbn'=>$_POST['isbn'],
            'doi'=>$_POST['doi'],
            'visibilidade'=>$_POST['visibilidade']
        );

        if($this->session->userdata('type') == 'A') { $data['docente_id'] = $_POST['docente_id']; }
        if ($id_livro == FALSE) { $this->db->insert('Livro',$data); }        
        else {
            $this->db->update('Livro', $data, "livro_id = $id_livro");
        }
    }

    public function apagar($id_livro) {
        $this->db->delete('Livro', array('livro_id'=>$id_livro));
    }

    public function enable_disable($id_livro) {
        $livro = $this->getLivro($id_livro);
        $this->db->update('Livro', array('visibilidade' => abs($livro['visibilidade'] -1)), array('livro_id' => $id_livro));
    }
}