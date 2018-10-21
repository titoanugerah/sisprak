<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
  }

  public function listAccount()
  {
    $data['notification'] = 'no';
    $data['account'] = $this->admin_model->getUserAccount();
    $data['view_name'] = 'listAccount';
    $this->load->view('template',$data);

  }

  public function detailAccount($id)
  {
    $data['notification'] = 'detailAccount';
    if ($this->input->post('updateAcount')) {
      $this->admin_model->updateAccount($id);
      $data['notification'] = 'updateAccountSuccess';
    }
    $data['account'] = $this->admin_model->getSelectedAccount($id);
    $data['view_name'] = 'detailAccount';
    $this->load->view('template',$data);

  }


}

 ?>
