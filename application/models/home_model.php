<?php

class home_model extends CI_model{
  public function __construct()
  {
    $this->load->database();
  }

  public function loginValidation()
  {
    $where = array(
      'username' =>  $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );
    $query = $this->db->get_where('account',$where);
    return $query;
  }

  public function getLoggedAccount()
  {
    $where = array(
      'username' =>  $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );
    $query = $this->db->get_where('account',$where);
    return $query->row();
  }

  public function getUpdatedAccount()
  {
    $where = array(
      'id' => $this->session->userdata['id']
    );
    $query = $this->db->get_where('account',$where);
    return $query->row();
  }

  public function updateAccount()
  {
    $where = array(
      'id' => $this->session->userdata['id']
    );

    $data = array(
      'username' => $this->input->post('username'),
      'fullname' => $this->input->post('fullname'),
      'email' => $this->input->post('email'),
      'pic_id' => $this->input->post('pic_id')
     );

     $this->db->where($where);
     $this->db->update('account',$data);
  }

  public function updatePassword()
  {
    $where = array(
      'id' => $this->session->userdata['id']
    );
    $data = array(
      'password' => md5($this->input->post('password'))
     );
     $this->db->where($where);
     $this->db->update('account',$data);
   }
}


 ?>
