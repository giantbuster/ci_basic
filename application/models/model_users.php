<?php

class Model_users extends CI_Model{

	public function valid_credentials(){
		//These are the sql queries. They're being written but not run yet.
		$this->load->library('encrypt');
		$this->db->where('email', $this->input->post('login_email'));
		$this->db->where('password', $this->encrypt->decode($this->input->post('login_password')));

		//$this->db->get will get any 'wheres' specified before it, on the specified table. 
		$query = $this->db->get('users');
		
		if ($query->num_rows() == 1){
			return true;
		} else {
			return false;
		}
	}

	//create_user()
	//-------------
	//Inserts a new entry for a user in the database
	public function create_user(){
		$this->load->library('encrypt');

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'password' => $this->encrypt->encode($this->input->post('password')),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		);
		$query = $this->db->insert('users', $data);
	}

	//get_user()
	//----------
	//Retrieves user information from the database, based on matching inputted email
	public function get_user($email){
		$sql = "SELECT * FROM users WHERE email = '".$email."'";
		$query = $this->db->query($sql);
		$data = array(
			'first_name' => $query->result()[0]->first_name,
			'last_name' => $query->result()[0]->last_name,
			'email' => $query->result()[0]->email,
			'logged_in' => true
		);
		$this->session->set_userdata($data);
	}
}