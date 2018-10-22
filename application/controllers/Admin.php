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

  public function addPraktikum()
  {
    if ($this->input->post('addPraktikum')) {
      $this->admin_model->addPraktikum();
      redirect(base_url('listPraktikum'));
    }
    $data['notification'] = 'no';
    $data['view_name'] = 'addPraktikum';
    $data['user'] = $this->admin_model->getUserAccount();
    $this->load->view('template',$data);
  }

  public function listPraktikum()
  {
    $data['notification'] = 'no';
    $data['praktikum'] = $this->admin_model->getPraktikum();
    $data['view_name'] = 'listPraktikum';
    $this->load->view('template',$data);
  }

  public function detailPraktikum($id)
  {
    $data['notification'] = 'no';
    if($this->input->post('updatePraktikum')){
      $this->admin_model->updatePraktikum($id);
    } elseif ($this->input->post('deletePraktikum')) {
      $this->admin_model->deletePraktikum($id);
      redirect(base_url('listPraktikum'));
    }
    $data['user'] = $this->admin_model->getUserAccount();
    $data['praktikum'] = $this->admin_model->getSelectedPraktikum($id);
    $data['view_name'] = 'detailPraktikum';
    $this->load->view('template',$data);
  }
}

 ?>
