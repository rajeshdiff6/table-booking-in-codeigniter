<?php

class Hotel extends CI_Controller {

	/*constructor used to load the model*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('hotel_model');
	}
	/*register function is used to register the customer*/
	public function register(){
		// Inialize session
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		/*validation rules are set to validate the fields before submitting the form*/
		$this->form_validation->set_rules('name', 'Name', 'is required');
		$this->form_validation->set_rules('username', 'Username', 'is required');
		$this->form_validation->set_rules('password', 'Password', 'is required');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'is required');
		$this->form_validation->set_rules('address', 'Address', 'is required');
		$this->form_validation->set_rules('phoneno', 'Phone no.', 'is required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('hotel/header');	
			$this->load->view('hotel/register');
			$this->load->view('hotel/footer');
		}
		else
		{
			$this->hotel_model->register();
			// Set username session variable
			$this->session->set_userdata('success', "Successfully Registered. Please login");
			$this->load->view('hotel/header');	
			$this->load->view('hotel/home');
			$this->load->view('hotel/footer');
		}
	}
	/*logout function is used to logout the user from the site*/
	public function logout(){
		// Inialize session
		$this->load->library('session');
		$this->load->view('hotel/header');	
		$this->load->view('hotel/logout');
		$this->load->view('hotel/footer');
	}
	/*home function is used to login the user, both customer and admin can login using the same login page*/
	public function home(){
		// Inialize session
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Login';
		
		$this->form_validation->set_rules('username', 'Username', 'is required');
		$this->form_validation->set_rules('password', 'Password', 'is required');
		
		if ($this->form_validation->run() === FALSE)
		{	
			$this->load->view('hotel/header', $data);	
			$this->load->view('hotel/home');
			$this->load->view('hotel/footer');
		}
		else
		{
			$login=$this->hotel_model->login();
			$user=$login->row_array();
			// Check username and password match
			if ($login->num_rows() == 1) {
					// Set username session variable
					$this->session->set_userdata('username', $this->input->post('username'));
					$this->load->view('hotel/header',$data);	
					if($user['user']){
					/*if the user is admin the reservation details is shown*/
						$this->status();
					}else{
					/*if the user is customer the booking table page will be shown*/
						$this->load->view('hotel/book');
					}	
					$this->load->view('hotel/footer');
			}
			else {
					//if the username or password is incorrect the login page is shown with message
					$this->session->set_userdata('incorrect', "User name or Password is incorrect");
					$this->load->view('hotel/header',$data);	
					$this->load->view('hotel/home');
					$this->load->view('hotel/footer');
			}
		}
	}
	/*if the user is admin, he can cancel the reservarion*/
	public function delete(){
		// Initialize session
		$this->load->library('session');
		if(!$this->session->userdata('username')){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('hotel/header');	
			$this->load->view('hotel/home');
			$this->load->view('hotel/footer');
		}else{
			$this->hotel_model->delete();
		}	
	}
	/*after the admin is logged in the reservation details is shown using this function*/
	public function status(){
		// Initialize session
		$this->load->library('session');
		if(!$this->session->userdata('username')){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('hotel/header');	
			$this->load->view('hotel/home');
			$this->load->view('hotel/footer');
		}else{
			// Inialize session
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['table']=$this->hotel_model->status();
			$this->load->view('hotel/status',$data);
		}	
	}
	/*table is booked using this function*/
	public function book()
	{	
		// Initialize session
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Book Ur Table';
		
		$this->form_validation->set_rules('timein', 'Time in', 'required');
		$this->form_validation->set_rules('timeout', 'Time out', 'required');
		$this->form_validation->set_rules('recipe', 'Recipe', 'required');
		$this->form_validation->set_rules('customername', 'Customer', 'required');
		if(!$this->session->userdata('username')){
				$this->load->view('hotel/header');	
				$this->load->view('hotel/home');
				$this->load->view('hotel/footer');
		}else{
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('hotel/header', $data);	
				$this->load->view('hotel/book');
				$this->load->view('hotel/footer');
			}
			else
			{
				$this->hotel_model->set_hotel();
				$this->load->view('hotel/header');	
				$this->load->view('hotel/success');
				$this->load->view('hotel/footer');				
			}
		}	
	}
	/*tables function is called using ajax from the book page to dynamically load the tables*/
	public function tables(){
		// Initialize session
		$this->load->library('session');
		if(!$this->session->userdata('username')){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('hotel/header');	
			$this->load->view('hotel/home');
			$this->load->view('hotel/footer');
		}else{
			$data['tablesreserved']=$this->hotel_model->check_and_load_tables();
			$this->load->view('hotel/tables',$data);
		}	
	}
}
?>