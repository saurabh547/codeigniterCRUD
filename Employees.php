<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->helper(array('url', 'form'));
        
    }

    public function index() {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('employees/index', $data);
    }

    public function create() {
        $this->load->view('employees/create');
    }

    public function store() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);

        $image = null;
        if ($this->upload->do_upload('image')) {
            $upload_data = $this->upload->data();
            $image = 'uploads/' . $upload_data['file_name'];
        }

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'designation' => $this->input->post('designation'),
            'image' => $image
        );

        $this->Employee_model->insert_employee($data);
        redirect('employees');
    }

    public function edit($id) {
        $data['employee'] = $this->Employee_model->get_employee_by_id($id);
        $this->load->view('employees/edit', $data);
    }

    public function update($id) {
        $employee = $this->Employee_model->get_employee_by_id($id);

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);

        $image = $employee['image'];
        if ($this->upload->do_upload('image')) {
            if (file_exists($image)) unlink($image);
            $upload_data = $this->upload->data();
            $image = 'uploads/' . $upload_data['file_name'];
        }

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'designation' => $this->input->post('designation'),
            'image' => $image
        );

        $this->Employee_model->update_employee($id, $data);
        redirect('employees');
    }

    public function delete($id) {
        $employee = $this->Employee_model->get_employee_by_id($id);
        if (file_exists($employee['image'])) unlink($employee['image']);
        $this->Employee_model->delete_employee($id);
        redirect('employees');
    }
}
