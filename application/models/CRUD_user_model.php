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

    public function getUserId($userId) {
        $this->db->select('userid');
        $this->db->where('userid', $userId);
        $query = $this->db->get('user_submission');
        $result = $query->row();
    
        if ($result) {
            return $result->submissionid;
        } else {
            return null;
        }
    }

    public function updateUser($data, $userId) {
        $this->db->where('userid', $userId);
        $this->db->update('users', $data);
    }

    public function updateUserSubmission($data, $submission_id) {
        $this->db->where('userid', $submission_id);
        $this->db->update('user_submission', $data);
    }

    public function getUserById($userId) {
        $query = $this->db->get_where('users', array('userid' => $userId));
        return $query->row_array();
    }

    public function getSubmissionId($userId) {
        $this->db->select('userid');
        $this->db->from('users');
        $this->db->where('userid', $userId);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->submission_id;
        } else {
            return false; // or handle the case where no submission is found
        }
    }
    
    

    // public function editUser($userId){
    //     echo "In editUser method of CRUD_user_model with userId: $userId<br>";
    //     echo 'Received userId: '. $userId;
    //     $userId = $this->input->post('userId');
    
    //     $data = array(
    //         'complete_name' => $this->input->post('name'),
    //         'pword' => $this->input->post('password'),
    //         'email' => $this->input->post('email'),
    //     );
    
    //     $this->db->where('userid', $userId);
    //     return $this->db->update('users', $data);
    // }
    
}
?>
