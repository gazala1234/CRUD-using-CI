<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_ctrl extends CI_Controller
{

    public function index()
    {
        $data['product_details'] = $this->Crud_model->getProducts();
        $this->load->view('crud_view', $data);
    }

    public function addProduct()
    {
        $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('price', 'Product Price', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Product Quantity', 'trim|required');

        if($this->form_validation->run() == false ){
            $error = [
                'error' => validation_errors()
            ];

            $this->session->set_flashdata($error);
        }
        else{
            $result = $this->Crud_model->insertProduct(
                [
                'name' => $this->input->post('name'), 
                'price' => $this->input->post('price'), 
                'quantity' => $this->input->post('quantity')
                ]
            );
            if($result){
                $this->session->set_flashdata('inserted', 'Your product has been added successfully');
            }
        }
        redirect('Crud_ctrl');
    }

        public function editProduct($id)
        {
            $data['product'] = $this->Crud_model->getProduct($id);
            $this->load->view('edit_view', $data);
        }

        public function update($id)
        {
            $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
            $this->form_validation->set_rules('price', 'Product Price', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Product Quantity', 'trim|required');
    
            if($this->form_validation->run() == false ){
                $error = [
                    'error' => validation_errors()
                ];
    
                $this->session->set_flashdata($error);
            }
            else{
                $result = $this->Crud_model->updateProduct(
                    [
                    'name' => $this->input->post('name'), 
                    'price' => $this->input->post('price'), 
                    'quantity' => $this->input->post('quantity')
                    ], $id);
                if($result){
                    $this->session->set_flashdata('updated', 'Your product has been updated successfully');
                }
            }
            redirect('Crud_ctrl');
        }

        public function deleteProduct($id)
        {
            $result = $this->Crud_model->delete($id);
            if($result == true){
                $this->session->set_flashdata('deleted', 'Your product has been deleted successfully');
            }
            redirect('Crud_ctrl');
        }
    }

?>