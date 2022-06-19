<?php

class Product_model extends CI_model{
    function create($formArray){
        $this->db->insert('products',$formArray);
    }
    function display(){
        return $products = $this->db->get('products')->result_array();
    }
    function getProduct($productId){
        $this->db->where('productId',$productId);
        return $product = $this->db->get('products')->row_array();
    }
    function updateProduct($productId,$formArray)
    {
        $this->db->where('productId',$productId);
        $this->db->update('products',$formArray);
    }
    function deleteProduct($productId){
        $this->db->where('productId',$productId);
        $this->db->delete('products');
    }
}
