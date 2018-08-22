<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class image_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    } 

    public function save_path($path, $longitude, $latitude, $id){
        $this->db->query("INSERT INTO images (image, longitude, latitude, user_id) VALUES ('$path', '$longitude', '$latitude', '$id')");
    }
 
}