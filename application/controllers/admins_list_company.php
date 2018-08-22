<?php

class admins_list_company extends CI_Controller {

    private $tabl          = 'companies';
    private $column_order  = array('logo','name','pending_complaints');
    private $column_search = array('name', 'pending_complaints');
    private $order         = array('name' => 'desc');

    public function __construct()
    {
            parent::__construct();
            $this->load->model('company_modal');
            $this->load->model('basic_data_table_model', 'person');
            $this->person->var_setter($this->tabl, $this->column_order, $this->column_search, $this->order);
    }

    public function index(){
        if(isset($this->session->userdata['loggedin'])){
            if($this->session->userdata['loggedin']['user_type'] == 0){
                redirect('/user_authentication/logout');
            }else if($this->session->userdata['loggedin']['user_type'] == 1){
                $data2['page_to_load'] = 'admins_list_company';
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
            $no++;
            $row = array();
            $row[] = '<img src="'.$person->logo.'" alt="Smiley face" height="42" width="42">';
            $row[] = $person->name;
            if($person->pending_complaints == 0){
                $row[] = 'no complaints';
            }else{
                $row[] = 'pending complaints';
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
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
 
    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                'name' => $this->input->post('name'),
                'pending_complaints' => $this->input->post('pending_complaints'),
                
            );
        $insert = $this->person->save($data);
        // echo json_encode(array("status" => TRUE));
        echo json_encode(array($insert));
    }
 
    public function ajax_update()
    {
        $data = array(
                'name' => $this->input->post('name'),
                'pending_complaints' => $this->input->post('pending_complaints'),
            );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}
?>