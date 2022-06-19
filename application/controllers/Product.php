<?php

class Product extends CI_Controller{


    function index(){
        $this->load->model('Product_model');
        $products = $this->Product_model->display();
        $data = array();
        $data['products']= $products;
       $this->load->view('products/list',$data); 
    }
    function create(){
        $this->load->model('Product_model');
        $this->form_validation->set_rules('productname','Product','required');
        $this->form_validation->set_rules('brand','Brand','required');
        $this->form_validation->set_rules('telephone','Supplier Tel','required');
        $this->form_validation->set_rules('supplier','Supplier','required');


        if($this->form_validation->run()== false){
            $this->load->view('products/create');
        }
        else{
            $formArray = array();
            $formArray['product_Name']= $this->input->post('productname');
            $formArray['brand'] = $this->input->post('brand');
            $formArray['supplier_phone'] = $this->input->post('telephone');
            $formArray['supplier'] = $this->input->post('supplier');

            $this->Product_model->create($formArray);
            $this->session->set_flashdata('success','New Product Added successfully');
            redirect(base_url().'Product/index');
        }
    }

    function edit($productId){
        $this->load->model('Product_model');
        $product = $this->Product_model->getProduct($productId);
        $data  = array();
        $data['product']= $product;

        $this->form_validation->set_rules('productname', 'Product', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('telephone', 'Supplier Tel', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
       
        if($this->form_validation->run()==false){
            $this->load->view('products/edit', $data);
        }else{
            $formArray = array();
            $formArray['product_Name'] = $this->input->post('productname');
            $formArray['brand'] = $this->input->post('brand');
            $formArray['supplier_phone'] = $this->input->post('telephone');
            $formArray['supplier'] = $this->input->post('supplier');
            
            $this->Product_model->updateProduct($productId,$formArray);

            $this->session->set_flashdata('success', 'Product <b>' . $product['product_Name'] .'</b> Updated successfully');
            redirect(base_url().'Product/index');
        }
    }
    function delete($productId){
        $this->load->model('Product_model');
        $product = $this->Product_model->getProduct($productId);
        $this->Product_model->deleteProduct($productId);

        $this->session->set_flashdata('success','Product <b>'.$product['product_Name'].'</b> Deleted successfully');
        redirect(base_url().'Product/index');
    }
}
