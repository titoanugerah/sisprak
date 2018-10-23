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
					'pic_id' => $account->pic_id,
					'email' => $account->email,
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
		if ($this->session->userdata['privilleges']=='user') {
			$data['praktikum'] = $this->home_model->getUserPraktikum();
		}

		$data['notification'] = 'no';
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
				'pic_id' => $account->pic_id,
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
		if ($this->session->userdata['privilleges']=='user') {
			$data['praktikum'] = $this->home_model->getUserPraktikum();
		}
		$data['notification'] = 'no';
		$data['view_name'] = 'dashboard';
		$this->load->view('template',$data);
	}

	public function regist()
	{
		if ($this->input->post('verifUser')) {
			$pic_id = $this->input->post('pic_id');
			$user = $this->home_model->verifUser();
			if ($user->num_rows()>0) {
				redirect(base_url('verifyUser/'.$pic_id));
			} else {
				$this->load->view('notification/verifFailed');
				$this->load->view('regist');
			}
		} else {
			$this->load->view('regist');
		}
	}

	public function verifyUser($pic_id)
	{
		if ($this->input->post('updateUser')) {
			$this->home_model->updateUser($pic_id);
			redirect(base_url('login'));
		} else {
			$data['account'] = $this->home_model->getVerifiedAccount($pic_id);
			$this->load->view('notification/verifiedUser',$data);
			$this->load->view('regist2',$data);
		}
	}



	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
