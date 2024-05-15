<?php
class Add_user_model extends CI_Model{
    
    public function add_user(){
        $data = array(
            'complete_name' => $this->input->post('name'),
            'pword' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post(''),
            'userid' => $this->input->post('user_id')
        );
        return $this->db->insert('users', $data);
    }
}
?>
