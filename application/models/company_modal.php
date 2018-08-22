<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class company_modal extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_companies(){
    	$array = array();
			$query = $this->db->query("SELECT id, name FROM companies");
			$i = 0 ;
			foreach ($query->result() as $row)
			{
				$array[$i]['name']  =  $row->name;
				$array[$i]['id'] = $row->id;
				$i++;
	    }
	    return $array;
	  }
 
}