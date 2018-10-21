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
    $data['account'] = $this->admin_model->getUserAccount();
    $data['view_name'] = 'listAccount';
    $this->load->view('template',$data);

  }

}

 ?>
