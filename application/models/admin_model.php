<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function validate_admin( $email, $password ) {
        $this->db->from('Admin');
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
                'id'=>$this->details->admin_id,
                'email'=>$this->details->email,
                'logged' => TRUE,
                'type'=>"A"
            )
        );
    }   
}