<?php

class company_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('company_modal');
                $this->load->model('basic_data_table_model','person');
        }

        public function index(){
                if(isset($this->session->userdata['loggedin'])){
                    if($this->session->userdata['loggedin']['user_type'] == 0){
                        redirect('/user_authentication/logout');
                    }else if($this->session->userdata['loggedin']['user_type'] == 1){
                        $data2['page_to_load'] = 'admins_company_info';
                        $this->load->view('template', $data2);
                    }
                }else {
                    $this->load->view('login_form');
                }
        }

        public function get_companies(){
            $r = $this->company_modal->get_companies();
            return $r;
        }

}
?>