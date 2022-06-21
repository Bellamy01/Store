<?php

class Outgoing extends CI_Controller
{


    function index()
    {
        $this->load->model('Outgoing_model');
        $products = $this->Outgoing_model->displayProduct();
        $productsData = array();
        $productsData['products']= $products;
        $outgoings = $this->Outgoing_model->display();
        $data = array();
        $data['outgoings'] = $outgoings;
        $this->load->view('outgoings/list', $data,$productsData);
    }
    
    function create()
    {

        $this->load->model('Outgoing_model');
        $productsData['products'] = $this->Outgoing_model->displayProduct();
        $this->form_validation->set_rules('product', 'Product', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('outgoings/create',$productsData);
        } else {
            
            $formArray = array();
            $formArray['productId'] = $this->input->post('products');
            $formArray['quantity'] = $this->input->post('quantity');

            $this->Outgoing_model->create($formArray);
            $this->session->set_flashdata('success', 'New Outgoing Added successfully');
            redirect(base_url() . 'Outgoing/index');
        }
    }
    //write a function to insert a new outgoing product
    

    function edit($outgoingId)
    {
        $this->load->model('Outgoing_model');
        $outgoing = $this->Outgoing_model->getOutgoing($outgoingId);
        $outgoingData  = array();
        $outgoingData['outgoing'] = $outgoing;
        $product = $this->Outgoing_model->displayProduct();
        $productsData= array(); 
        $productsData['products'] = $product;


        $this->form_validation->set_rules('product', 'Product', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $data = array();

        $data= array($outgoingData,$productsData);
        if ($this->form_validation->run() == false) {
            $this->load->view('outgoings/edit',$data[0],$data[1]);
        } else {
            $formArray = array();
            $formArray['productId'] = $this->input->post('products');
            $formArray['quantity'] = $this->input->post('quantity');

            $this->Outgoing_model->updateOutgoing($outgoingId, $formArray);

            $this->session->set_flashdata('success', 'Outgoing Updated successfully');
            redirect(base_url() . 'Outgoing/index');
        }
    }
    function delete($outgoingId)
    {
        $this->load->model('Outgoing_model');
        $outgoing = $this->Outgoing_model->getOutgoing($outgoingId);
        $this->Outgoing_model->deleteOutgoing($outgoingId);

        $this->session->set_flashdata('success', 'Outgoing Deleted successfully');
        redirect(base_url() . 'Outgoing/index');
    }
}
