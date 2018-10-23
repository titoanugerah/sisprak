<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('home_model');
    $this->load->model('admin_model');

  }

  public function addPraktikan($id)
  {
    if ($this->input->post('addPraktikan')) {
      $this->user_model->uploadPraktikan($id);
      redirect(base_url('listPraktikan/'.$id));

    } elseif ($this->input->post('addRole')) {
      $this->user_model->deleteRole($id);
      $this->user_model->addRole($id);
      redirect(base_url('listPraktikan/'.$id));
    }
    $data['user'] = $this->user_model->getUserAccount();
    $data['praktikum'] = $this->home_model->getUserPraktikum();
    $data['notification'] = 'no';
    $data['view_name'] = 'addPraktikan';
    $this->load->view('template',$data);
  }

  public function listPraktikan($id)
  {
    $data['detail'] = $this->user_model->getSelectedPraktikum($id);
    $data['asist'] = $this->user_model->getListAssisten($id);
    $data['list'] = $this->user_model->getListPraktikan($id);
    $data['praktikum'] = $this->home_model->getUserPraktikum();
    $data['notification'] = 'no';
    $data['view_name'] = 'listPraktikan';
    $this->load->view('template',$data);
  }
}
 ?>
