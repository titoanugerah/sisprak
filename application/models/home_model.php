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
    $where1 = array(
      'username' => $this->input->post('username'),
     );
    $query1 = $this->db->get_where('account',$where1);
    $where2 = array(
      'username' => $this->input->post('username'),
     );
    $query2 = $this->db->get_where('view_'.$query1->row('privilleges'),$where1);
    return $query2->row();
  }

  public function getUpdatedAccount()
  {
    $where = array(
      'id' => $this->session->userdata['id']
    );
    $query = $this->db->get_where('view_'.$this->session->userdata['privilleges'],$where);
    return $query->row();
  }

  public function updateAccount()
  {
    $where = array(
      'id' => $this->session->userdata['id']
    );

    $data1 = array(
      'username' => $this->input->post('username')
     );

    $data = array(
      'fullname' => $this->input->post('fullname'),
      'email' => $this->input->post('email'),
      'no_hp' => $this->input->post('no_hp')
     );

     $this->db->where($where);
     $this->db->update('account_'.$this->session->userdata['privilleges'],$data);
     $this->db->where($where);
     $this->db->update('account',$data1);

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
