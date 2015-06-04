<?php
class Hotel_model extends CI_Model {
	//loading the database
	public function __construct()
	{
		$this->load->database();
	}
	//user login
	public function login(){
	
		// Inialize session
		$this->load->library('session');
		
		// Retrieve username and password from database according to user's input
		$login = $this->db->query("SELECT * FROM login WHERE (username = '" . mysql_real_escape_string($this->input->post('username')) . "') and (password = '" . mysql_real_escape_string(md5($this->input->post('password'))) . "')");
		
		return $login;
	}
	//table booking details is inserted here
	public function set_hotel()
	{
		$this->load->helper('url');
		$result = $this->db->query('SELECT max(id) from reservation');
		$result1=$result->row_array();
		$data = array(
			'id'=>$result1['max(id)']+1,
			'tableno' => $this->input->post('table'),
			'timein' => $mysqltime = date ("Y/m/d H:i:s", strtotime($this->input->post('timein'))),
			'timeout' => $mysqltime = date ("Y/m/d H:i:s", strtotime($this->input->post('timeout'))),
			'recipe' => $this->input->post('recipe'),
			'customer' => $this->input->post('customername'),
			'smsno'=> rand(34343434,45434564)			
		);
		
		return $this->db->insert('reservation', $data);
	}	
	//booking is cancelled here
	public function delete(){
		$booking_id=$this->input->get('booking_id');
		$this->db->delete('reservation', array('id' => $booking_id)); 
	}
	//reservation details is loaded here
	public function status(){
		//using codeigniter table function to create the table
		$this->load->library('table');
		$date = date('Y-m-d', time());
		$query = $this->db->query("SELECT * FROM reservation where timein>".$date);
		$result = $query->result();
		$this->table->add_row('Booking ID','Name', 'Table #', 'Time in', 'Time out','Recipe','Msg Code','Cancel');
		if($query->num_rows() > 0)
		{
		  foreach($result as $row)
		  {
			$this->table->add_row($row->id,$row->customer, $row->tableno, $row->timein,$row->timeout,$row->recipe,$row->smsno,"<a id=\"cancel$row->id\" onclick=\"cancel($row->id);\">cancel</a>"); //Add each result row into table
		  }
		}else{
		   $this->table->add_row('No results found','','','');
		}
		
		
		return $this->table->generate();		
	}
	//new user is registered here
	public function register(){
		$data = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'address' => $this->input->post('address'),
			'ph' => $this->input->post('phoneno'),
			'user' => 0
		);
		
		return $this->db->insert('login', $data);
	}
	//to load the already booked table details if there
	public function check_and_load_tables(){
		$timeindate=$this->input->get('timeindate');
		if(isset($timeindate)){
			$timeinhours=$this->input->get('timeinhours');
			$timeinmins=$this->input->get('timeinmins');
			$timeinsecs=$this->input->get('timeinsecs');
			$timeindate=explode("/",$timeindate);
			$timeinyear=$timeindate[0];
			$timeinmonth=$timeindate[1];
			$timeinday=$timeindate[2];
			$timeoutdate=$this->input->get('timeoutdate');
			$timeouthours=$this->input->get('timeouthours');
			$timeoutmins=$this->input->get('timeoutmins');
			$timeoutsecs=$this->input->get('timeoutsecs');
			$timeoutdate=explode("/",$timeoutdate);
			$timeoutyear=$timeoutdate[0];
			$timeoutmonth=$timeoutdate[1];
			$timeoutday=$timeoutdate[2];
			$timeinstart=$timeinyear.'-'.$timeinmonth.'-'.$timeinday.' '.$timeinhours.':'.$timeinmins.':'.$timeinsecs;
			$timeinend=$timeoutyear.'-'.$timeoutmonth.'-'.$timeoutday.' '.$timeouthours.':'.$timeoutmins.':'.$timeoutsecs;
			$result = $this->db->query("SELECT tableno FROM `reservation` where timein between '".$timeinstart."' and '".$timeinend."'");
			$result1=$result->result_array();
			$result2 = $this->db->query("SELECT tableno FROM `reservation` where timeout between '".$timeinstart."' and '".$timeinend."'");
			$result3=$result2->result_array();
			$tablenos=null;
			if($result3!=null){
				for($i=0;$i<count($result3);$i++){
					$tablenos.=$result3[$i]['tableno'].",";
				}
			}
			if($result1!=null){
				for($i=0;$i<count($result1);$i++){
					$tablenos.=$result1[$i]['tableno'].",";
				}
			}
			if($result3!=null||$result1!=null){
				$tablenos=explode(",",$tablenos);
				return array_unique($tablenos);
			}
		}else{
				
		}	
	}
}
?>