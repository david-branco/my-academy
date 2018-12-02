<?php 

    class Teacher_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getTeacherSearch($term) { 
        $sql = $this->db->query('SELECT * FROM Docente WHERE UCASE(nome) like "%'. mysql_real_escape_string($term) .'%" order by nome asc limit 0,10');
        return $sql ->result();
    }

    public function validate_teacher( $email, $password ) {
        $this->db->from('Docente');
        $this->db->where('email',$email );
        $this->db->where( 'password', md5($password) );
        $login = $this->db->get()->result();

        if ( is_array($login) && count($login) == 1 ) {
            $this->details = $login[0];
            $this->set_session();
            return true;
        }
        return false;
    }

    public function set_session() {
        $this->session->set_userdata( 
            array(
                'id'=>$this->details->docente_id,
                'name'=> $this->details->nome,
                'email'=>$this->details->email,
                'logged' => TRUE,
                'type'=>"T"
            )
        );
    }

    public function getTeachers() {
        $query = $this->db->query("SELECT * FROM Docente");
        return $query->result();
    }

    public function getTeacherByShort($url) {
        $query = $this->db->get_where('Docente',array('shorturl'=>$url));
        return $query->row_array();
    }

    public function getTeacherByURL($url) {
        $query = $this->db->get_where('Docente',array('shorturl'=>$url));
        return $query->row_array();
    }

    public function getTeacher($id) {
        $query = $this->db->get_where('Docente',array('docente_id'=>$id));
        return $query->row_array();
    }

    public function getClassFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Ensino
             WHERE docente_id =$id
             ORDER BY periodo");
        return $query->result();
    }

    public function getPublicClassFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Ensino
             WHERE docente_id =$id AND visibilidade = 1
             ORDER BY periodo");
        return $query->result();
    }

    public function getEventsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Evento
             WHERE docente_id =$id
             ORDER BY data_data");
        return $query->result();
    }

    public function getPublicEventsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Evento
             WHERE docente_id =$id AND visibilidade = 1
             ORDER BY data_data");
        return $query->result();
    }

    public function getSupervisionsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Supervisao
             WHERE docente_id =$id");
        return $query->result();
    }

    public function getPublicSupervisionsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Supervisao
             WHERE docente_id =$id AND visibilidade = 1");
        return $query->result();
    }

    public function getExamsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Exame
             WHERE docente_id = $id");
        return $query->result();
    }

    public function getPublicExamsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Exame
             WHERE docente_id = $id AND visibilidade = 1");
        return $query->result();
    }

    public function getInvestigationsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Investigacao
             WHERE docente_id =$id
             ORDER BY periodo");
        return $query->result();
    }

    public function getPublicInvestigationsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Investigacao
             WHERE docente_id =$id AND visibilidade = 1
             ORDER BY periodo");
        return $query->result();
    }

    public function getBooksFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Livro
             WHERE docente_id =$id
             ORDER BY data_data");
        return $query->result();
    }

    public function getPublicBooksFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Livro
             WHERE docente_id =$id AND visibilidade = 1
             ORDER BY data_data");
        return $query->result();
    }

    public function getProceduresFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Procedimento
             WHERE docente_id =$id
             ORDER BY data_data");
        return $query->result();
    }

    public function getPublicProceduresFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Procedimento
             WHERE docente_id =$id AND visibilidade = 1
             ORDER BY data_data");
        return $query->result();
    }

    public function getArticlesFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Artigo
             WHERE docente_id =$id
             ORDER BY data_data");
        return $query->result();
    }

    public function getPublicArticlesFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Artigo
             WHERE docente_id =$id AND visibilidade = 1
             ORDER BY data_data");
        return $query->result();
    }

    public function getManagementsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Gestao
             WHERE docente_id =$id
             ORDER BY periodo");
        return $query->result();
    }

    public function getPublicManagementsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Gestao
             WHERE docente_id =$id AND visibilidade = 1
             ORDER BY periodo");
        return $query->result();
    }

    public function getCommunicationsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Comunicacao
             WHERE docente_id =$id
             ORDER BY data_data");
        return $query->result();
    }

    public function getPublicCommunicationsFromTeacher($id) {
        $query = $this->db->query(
            "SELECT * 
             FROM Comunicacao
             WHERE docente_id =$id AND visibilidade = 1
             ORDER BY data_data");
        return $query->result();
    }

    public function showVisibilidade($val) {
        return ($val == 1)?  "Public" : "Private";                               
    }

    public function inserir($docente) {

        $data=array(
            'nome'=>$_POST['nome'],
            'password'=>md5($_POST['password']),
            'email'=>$_POST['email'],
            'website'=>$_POST['website'],
            'contato'=>$_POST['contato'],
            'info_pessoal'=>$_POST['info_pessoal'],
            'info_academica'=>$_POST['info_academica'],
            'info_hobbies'=>$_POST['info_hobbies']
        );

        $this->load->library('upload');
        $file = $this->upload->data();

        if ($docente == FALSE) { 
            $this->db->insert('Docente',$data);
            $docente = $this->db->insert_id();
            if($file ["is_image"]) {
                $data['foto'] = "/uploads/photos/teacher/teacherphoto".$docente.".jpg";
                $this->db->update('Docente', $data, "docente_id = $docente");
                rename($file['full_path'], $file['file_path']."teacherphoto".$docente.".jpg");
            }
            mkdir('./downloads/pubs/'.$docente, 0777, true);
        }
        else {
            if($file ["is_image"]) {
                $data['foto'] = "/uploads/photos/teacher/". $file['file_name'];
            }
            $this->db->update('Docente', $data, "docente_id = $docente");
        }

        return $docente;          
    }

    public function apagar($docente) {
        $this->db->delete('Ensino', array('docente_id' => $docente)); 
        $this->db->delete('Supervisao', array('docente_id' => $docente)); 
        $this->db->delete('Evento', array('docente_id' => $docente)); 
        $this->db->delete('Exame', array('docente_id' => $docente)); 
        $this->db->delete('Investigacao', array('docente_id' => $docente)); 
        $this->db->delete('Artigo', array('docente_id' => $docente)); 
        $this->db->delete('Procedimento', array('docente_id' => $docente)); 
        $this->db->delete('Livro', array('docente_id' => $docente)); 
        $this->db->delete('Comunicacao', array('docente_id' => $docente)); 
        $this->db->delete('Gestao', array('docente_id' => $docente)); 
        $this->db->delete('Docente', array('docente_id' => $docente)); 
    }

}
