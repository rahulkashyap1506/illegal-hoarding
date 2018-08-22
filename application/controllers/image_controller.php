<?php

class image_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('image_model');
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);
                $data2['page_to_load'] = 'admin_page';

                if ( ! $this->upload->do_upload('userfile'))
                {       
                        $data2['error'] = array('error' => $this->upload->display_errors());
                        print_r($data2);
                        //redirect('/user_authentication');
                }
                else
                {
                        $data = $this->upload->data();
                        $latitude = $this->input->post('latitude');
                        $longitude = $this->input->post('longitude');
                        $id = $this->session->userdata['loggedin']['id'];
                        $path = 'http://localhost/hackwithinfi/uploads/'.$data['file_name'];

                        $this->image_model->save_path($path, $longitude, $latitude, $id);
                        redirect('/user_authentication');
                }
        }
}
?>