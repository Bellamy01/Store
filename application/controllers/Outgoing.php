<?php

class Outgoing extends CI_Controller
{


    function index()
    {
        $this->load->model('Outgoing_model');
        $outgoings = $this->Outgoing_model->display();
        $data = array();
        $data['outgoing'] = $outgoings;
        $this->load->view('outgoings/list', $data);
    }
    function create()
    {

        $this->load->model('Outgoing_model');
        $products = $this->Outgoing_model->displayProduct();
        $product = $this->Outgoing_model->getProduct($productId);
        $this->form_validation->set_rules('productId', 'Product', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('outgoing/create');
        } else {
            $formArray = array();
            $formArray['productId'] = $this->input->post('productId');
            $formArray['quantity'] = $this->input->post('quantity');

            $this->Outgoing_model->create($formArray);
            $this->session->set_flashdata('success', 'New Outgoing Added successfully');
            redirect(base_url() . 'Outgoing/index');
        }
    }

    function edit($outgoingId)
    {
        $this->load->model('Outgoing_model');
        $outgoing = $this->Outgoing_model->getProduct($outgoingId);
        $data  = array();
        $data['s_outgoing'] = $outgoing;

        $this->form_validation->set_rules('productname', 'Product', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('telephone', 'Supplier Tel', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('products/edit', $data);
        } else {
            $formArray = array();
            $formArray['product_Name'] = $this->input->post('productname');
            $formArray['brand'] = $this->input->post('brand');
            $formArray['supplier_phone'] = $this->input->post('telephone');
            $formArray['supplier'] = $this->input->post('supplier');

            $this->Outgoing_model->updateProduct($outgoingId, $formArray);

            $this->session->set_flashdata('success', 'Product <b>' . $outgoing['product_Name'] . '</b> Updated successfully');
            redirect(base_url() . 'Product/index');
        }
    }
    function delete($outgoingId)
    {
        $this->load->model('Outgoing_model');
        $outgoing = $this->Outgoing_model->getProduct($outgoingId);
        $this->Outgoing_model->deleteProduct($outgoingId);

        $this->session->set_flashdata('success', 'Product <b>' . $outgoing['product_Name'] . '</b> Deleted successfully');
        redirect(base_url() . 'Product/index');
    }
}
