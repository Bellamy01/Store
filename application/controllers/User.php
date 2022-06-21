<?php

class User extends CI_Controller{


    function index(){
        $this->load->model('User_model');
        $users = $this->User_model->display();
        $data = array();
        $data['users']= $users;
       $this->load->view('store/users/list',$data); 
    }
    function create(){
        $this->load->model('User_model');
        $this->form_validation->set_rules('fname','Firstname','required');
        $this->form_validation->set_rules('lname', 'Lastname', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required');
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()== false){
            $this->load->view('store/users/create');
        }
        else{
            $formArray = array();
            $formArray['firstName']= $this->input->post('fname');
            $formArray['lastName'] = $this->input->post('lname');
            $formArray['telephone'] = $this->input->post('telephone');
            $formArray['gender'] = $this->input->post('gender');
            $formArray['nationality'] = $this->input->post('nationality');
            $formArray['username'] = $this->input->post('uname');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = $this->input->post('password');

            $this->User_model->create($formArray);
            $this->session->set_flashdata('success','New User Added successfully');
            redirect(base_url().'User/index');
        }
    }

    function edit($userId){
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userId);
        $data  = array();
        $data['user']= $user;

        $this->form_validation->set_rules('fname','Firstname','required');
        $this->form_validation->set_rules('lname', 'Lastname', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required');
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()==false){
            $this->load->view('store/users/edit', $data);
        }else{
            $formArray = array();
            $formArray['firstName'] = $this->input->post('fname');
            $formArray['lastName'] = $this->input->post('lname');
            $formArray['telephone'] = $this->input->post('telephone');
            $formArray['gender'] = $this->input->post('gender');
            $formArray['nationality'] = $this->input->post('nationality');
            $formArray['username'] = $this->input->post('uname');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = $this->input->post('password');
            
            $this->User_model->updateUser($userId,$formArray);

            $this->session->set_flashdata('success', 'User <b>' . $user['firstName'] . " " . $user['lastName'] . '</b> Updated successfully');
            redirect(base_url().'User/index');
        }
    }
    function delete($userId){
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userId);
        $this->User_model->deleteUSer($userId);

        $this->session->set_flashdata('success','User <b>'.$user['firstName']." ".$user['lastName']. '</b> Deleted successfully');
        redirect(base_url().'User/index');
    }
}

?>