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

  public function deleteAsist($id)
  {
    $role = $this->user_model->getSelectedRole($id);
    $this->user_model->deleteSelectedRole($id);
    redirect(base_url('listPraktikan/'.$role->id_praktikum));
  }

  public function deletePraktikan($id)
  {
    $this->user_model->deleteSelectedRole($id);
    redirect(base_url('listPraktikan/'.$role->id_praktikum));
  }

  public function modulPraktikum($id)
  {
    if ($this->input->post('addModul')) {
      $this->user_model->addModul($id);
    }
    $data['detail'] = $this->user_model->getSelectedPraktikum($id);
    $data['modul1'] = $this->user_model->getModul($id);
    $data['user'] = $this->user_model->getListAssisten($id);
    $data['praktikum'] = $this->home_model->getUserPraktikum();
    $data['notification'] = 'no';
    $data['view_name'] = 'modulPraktikum';
    $this->load->view('template',$data);
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

  public function editModul($id)
  {
    $data['detail'] = $this->home_model->getDetailModul($id);
    $data['user'] = $this->user_model->getListAssisten($data['detail']->id_praktikum);
    $data['praktikum'] = $this->home_model->getUserPraktikum();

    if ($this->input->post('updateModul')) {
      $this->user_model->updateModul($id);
    } elseif ($this->input->post('back')) {
      $data['detail'] = $this->home_model->getDetailModul($id);
      redirect(base_url('modulPraktikum/'.$data['detail']->id_praktikum));
    } elseif ($this->input->post('deleteModul')) {
      $data['detail'] = $this->home_model->getDetailModul($id);
      $this->user_model->deleteModul($id);
      redirect(base_url('modulPraktikum/'.$data['detail']->id_praktikum));
    } elseif ($this->input->post('uploadFile')) {
      $config['upload_path']   = APPPATH.'../assets/modul/';
      $config['overwrite'] = TRUE;
      $config['file_name']     = "[RSBK]".$this->input->post('type')." Bab ".$detail->modul;
      $config['allowed_types'] = 'jpg|png';
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('carousel_img_')) {
        echo $this->upload->display_errors();
      } else {
        $this->home_model->updateCarousel($config['file_name']);
      }

    }
    $data['detail'] = $this->home_model->getDetailModul($id);
    $data['user'] = $this->user_model->getListAssisten($data['detail']->id_praktikum);
    $data['praktikum'] = $this->home_model->getUserPraktikum();
    $data['notification'] = 'no';
    $data['view_name'] = 'editModul';
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
