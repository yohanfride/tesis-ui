<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

	public function __construct() {

        parent::__construct();  
		if(!$this->session->userdata('dasboard_iot')) redirect(base_url() . "auth/login");
    }

	public function index()
	{        
		$data=array();
		$data['title']='Home';
		$this->load->view('index', $data);
	}	
	/* 
	LIST MENU
	Home	
	Group Device
	Device
	*/

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
