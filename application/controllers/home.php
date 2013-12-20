<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	//index()
	//-------
	//Home controller loads view_home by default
	public function index(){
		if ($this->session->userdata('logged_in')){
			redirect('home/profile');
		}
		$this->load->view('view_home');
	}

	//log_in()
	//--------
	//Generates user session from database
	public function log_in($email){
		$this->load->model('model_users');
		$this->model_users->get_user($email);
		redirect('home/profile');
	}

	//profile()
	//---------
	//Sends user to profile page
	public function profile(){
		$this->load->view('view_profile');
	}

	//log_out()
	//-------
	//Destroys session and sends user Home
	public function log_out(){
		$this->session->sess_destroy();
		redirect('home');
	}

	//login_validation()
	//------------------
	//Validates login credentials, checks database, and logs user in if successful
	public function login_validation(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('login_email', 'Email', 'required|callback_validate_credentials');

		if ($this->form_validation->run() == FALSE){
			$data['login_error'] = validation_errors();
			$this->load->view('view_home', $data);
		} else {
			$this->log_in($this->input->post('login_email'));
		}
	}

	//register_validation()
	//---------------------
	//Validates register credentials, checks database for unique email.
	//If successful, creates new user in database and then logs user in
	public function register_validation(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]');

		$this->form_validation->set_message('is_unique', "That email already exists");

		if ($this->form_validation->run() == FALSE){

			$data['register_error'] = validation_errors();
			$this->load->view('view_home', $data);
		} else {
			//Create user in database
			$this->load->model('model_users');
			$this->model_users->create_user();

			//Log user in
			$this->log_in($this->input->post('email'));
		}
	}

	//validate_credentials()
	//----------------------
	//Checks database for matching email and password upon login attempt
	public function validate_credentials(){
		$this->load->model('model_users');
		if ($this->model_users->valid_credentials()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', "Incorrect username/password");
			return false;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */