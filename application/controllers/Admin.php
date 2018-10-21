<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->library('Excel');

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
    $data['notification'] = 'no';
    if ($this->input->post('updateAcount')) {
      $this->admin_model->updateAccount($id);
      $data['notification'] = 'updateSuccess';
    } else if ($this->input->post('resetPasswordAccount')) {
      $newPassword = $this->admin_model->resetPasswordAccount($id);
      $data['notification'] = 'updateSuccess';
    } elseif ($this->input->post('deleteAccount')) {
      $this->admin_model->deleteAccount($id);
      redirect(base_url('listAccount'));
    }
    $data['account'] = $this->admin_model->getSelectedAccount($id);
    $data['view_name'] = 'detailAccount';
    $this->load->view('template',$data);
  }

  public function addAccount()
  {
    if ($this->input->post('createSingleAccount')) {
      $this->admin_model->createSingleAccount();
      redirect(base_url('listAccount'));
    } else if($this->input->post('uploadAccount')){
      $this->admin_model->uploadAccount();
      redirect(base_url('listAccount'));
    }
    $data['notification'] = 'no';
    $data['view_name'] = 'addAccount';
    $this->load->view('template',$data);
  }
}

 ?>
