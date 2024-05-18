<?php
class CRUD_user_model extends CI_Model{
    
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

    public function get_user_by_id($userId) {
        return $this->db->get_where('users', array('userid' => $userId))->row_array();
    }      

    public function editUser($userId){
        echo "In editUser method of CRUD_user_model with userId: $userId<br>";
        echo 'Received userId: '. $userId;
        $userId = $this->input->post('userId');
    
        $data = array(
            'complete_name' => $this->input->post('name'),
            'pword' => $this->input->post('password'),
            'email' => $this->input->post('email'),
        );
    
        $this->db->where('userid', $userId);
        return $this->db->update('users', $data);
    }
    
}
?>
