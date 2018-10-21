<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		redirect(base_url('login'));
	}

	public function login()
	{
		if ($this->input->post('loginValidation')) {
			$login = $this->home_model->loginValidation();
			if ($login->num_rows() > 0) {
				$account = $this->home_model->getLoggedAccount();
				$dataSession = array(
					'login' => true,
					'id' => $account->id,
					'username' => $account->username,
					'password' => $account->password,
					'fullname' => $account->fullname,
					'email' => $account->email,
					'no_hp' => $account->no_hp,
					'status' => $account->status,
					'privilleges' => $account->privilleges
 				 );
				 $this->session->set_userdata($dataSession);
				 redirect(base_url('dashboard'));
			} else {
				$this->load->view('notification/loginFailed');
				$this->load->view('login');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function profile()
	{
		if ($this->input->post('updateAccount')) {
			$this->home_model->updateAccount();
			$account = $this->home_model->getUpdatedAccount();
			$dataSession = array(
				'login' => true,
				'id' => $account->id,
				'username' => $account->username,
				'password' => $account->password,
				'fullname' => $account->fullname,
				'email' => $account->email,
				'no_hp' => $account->no_hp,
				'status' => $account->status,
				'privilleges' => $account->privilleges
			 );
			 $this->session->set_userdata($dataSession);
		} elseif ($this->input->post('updatePassword')) {
			$this->home_model->updatePassword();
		}
		$data['view_name'] = 'profile';
		$this->load->view('template',$data);
	}

	public function dashboard()
	{
		$data['view_name'] = 'dashboard';
		$this->load->view('template',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
