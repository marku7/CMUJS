<?php
class Add_user_model extends CI_Model{
    
    public function add_user(){
        $data = array(
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('name'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email')
        );
        return $this->db->insert('users', $data);
    }
}
?>
