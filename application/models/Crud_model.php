<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model{
    public function getProducts()
    {
       $query = $this->db->get('products');
       if($query){
            return $query->result();
       }
    }

    public function insertProduct($data)
    {
        $query = $this->db->insert('products', $data);
        if($query){
            return true;
        }
        else {
            return false;
        }
    }

    public function getProduct($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('products');

        if($query){
            return $query->row();
        }
    }

    public function updateProduct($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('products', $data);
        if($query){
            return true;
        }
        else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('products');
        if($query){
            return true;
        }
        else {
            return false;
        }
    }
}

?>