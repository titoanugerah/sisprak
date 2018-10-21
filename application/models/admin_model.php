<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_model{
    public function __construct()
    {
      $this->load->database();
    }

    public function getUserAccount()
    {
      $where = array('privilleges' => 'user' );
      $query = $this->db->get_where('account',$where);
      return $query->result();
    }

    public function getSelectedAccount($id)
    {
      $where = array('id' => $id );
      $query = $this->db->get_where('account',$where);
      return $query->row();

    }

}
?>
