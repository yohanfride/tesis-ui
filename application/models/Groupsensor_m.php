<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class groupsensor_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_detail($id){
		$data = array(
			"groupsensor_code" => $id
		);
		$url = $this->config->item('url_node')."groupsensor/detail/";				
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."groupsensor/add/";				
		return json_decode($this->sendPost($url,$data));
	}

	function edit($id,$data){
		$data+=["id" => $id];
		$url = $this->config->item('url_node')."groupsensor/edit/";				
		return json_decode($this->sendPost($url,$data));
	}
	
	function del($id){
		$data = array(
			"id" => $id
		);
		$url = $this->config->item('url_node')."groupsensor/delete/";				
		return json_decode($this->sendPost($url,$data));
	}	

	function search($data){
		$url = $this->config->item('url_node')."groupsensor/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."groupsensor/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function addMember($data){
		$url = $this->config->item('url_node')."groupsensor/member/add/";				
		return json_decode($this->sendPost($url,$data));
	}

	function editMember($data){
		$url = $this->config->item('url_node')."groupsensor/member/edit/";				
		return json_decode($this->sendPost($url,$data));
	}

	function removeMember($data){
		$url = $this->config->item('url_node')."groupsensor/member/delete/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
