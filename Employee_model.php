

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {
    public function get_all_employees() {
        return $this->db->get('employees')->result_array();
    }

    public function insert_employee($data) {
        return $this->db->insert('employees', $data);
    }

    public function get_employee_by_id($id) {
        return $this->db->where('id', $id)->get('employees')->row_array();
    }

    public function update_employee($id, $data) {
        return $this->db->where('id', $id)->update('employees', $data);
    }

    public function delete_employee($id) {
        return $this->db->where('id', $id)->delete('employees');
    }
}


