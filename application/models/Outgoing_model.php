<?php

class Outgoing_model extends CI_model
{
    function getProduct($productId)
    {
        $this->db->where('productId', $productId);
        return $product = $this->db->get('products')->row_array();
    }
    function displayProduct()
    {
        return $products = $this->db->get('products')->result_array();
    }
    function create($formArray)
    {
        $this->db->insert('outgoing', $formArray);
    }
    function display()
    {
        return $outgoings = $this->db->get('outgoing')->result_array();
    }
    function getOutgoing($outgoingId)
    {
        $this->db->where('outgoingId', $outgoingId);
        return $outgoing = $this->db->get('outgoing')->row_array();
    }
    function updateOutgoing($outgoingId, $formArray)
    {
        $this->db->where('outgoingtId', $outgoingId);
        $this->db->update('outgoing', $formArray);
    }
    function deleteOutgoing($outgoingId)
    {
        $this->db->where('outgoingId', $outgoingId);
        $this->db->delete('outgoing');
    }
}
