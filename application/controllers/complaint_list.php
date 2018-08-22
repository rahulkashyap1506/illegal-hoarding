<?php

class complaint_list extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('complaint_model', 'person');
        }

        public function index(){
                if(isset($this->session->userdata['loggedin'])){
                    if($this->session->userdata['loggedin']['user_type'] == 0){
                        $data2['page_to_load'] = 'complaint_list';
                        $this->load->view('template', $data2);
                    }else if($this->session->userdata['loggedin']['user_type'] == 1){
                        $data2['page_to_load'] = 'admins_complaint_list';
                        $this->load->view('template', $data2);
                    }
                }else {
                    $this->load->view('login_form');
                }
        }

        public function ajax_list()
        {
                $list = $this->person->get_datatables();
                $data = array();
                $no = $_POST['start'];
                foreach ($list as $person) {
                    if($person->user_id == $this->session->userdata['loggedin']['id']){
                        $no++;
                        $row = array();
                        //$row[] = $person->image;
                        $row[] = '<img src="'.$person->image.'" alt="Smiley face" height="42" width="42">';
                        //add html for action
                        if($person->processed == 0){
                            $row[] = 'To be processed';
                        }else{
                            $row[] = 'already processed';
                        }

                        $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                        
                     
                        $data[] = $row;
                    }
                }

                $output = array(
                                "draw" => $_POST['draw'],
                                "recordsTotal" => $this->person->count_all(),
                                "recordsFiltered" => $this->person->count_filtered(),
                                "data" => $data,
                        );
                //output to json format
                echo json_encode($output);
        }

        public function admins_ajax_list()
        {
                $list = $this->person->get_datatables();
                $data = array();
                $no = $_POST['start'];
                foreach ($list as $person) {
                    $no++;
                    $row = array();
                    //$row[] = $person->image;
                    $row[] = '<img src="'.$person->image.'" alt="Smiley face" height="42" width="42">';
                    //add html for action
                    if($person->processed == 0){
                        $row[] = 'To be processed';
                    }else{
                        $row[] = 'already processed';
                    }

                    $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                    
                    $data[] = $row;
                }

                $output = array(
                                "draw" => $_POST['draw'],
                                "recordsTotal" => $this->person->count_all(),
                                "recordsFiltered" => $this->person->count_filtered(),
                                "data" => $data,
                        );
                //output to json format
                echo json_encode($output);
        }

    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}
?>