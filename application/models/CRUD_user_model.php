<?php
class CRUD_user_model extends CI_Model{
    
    public function add_user(){
        $data = array(
            'complete_name' => $this->input->post('name'),
            'pword' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role'),
            'status' => 0,
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

    //kani
    public function updateUser($data, $userId) {
        $this->db->where('userid', $userId);
        $this->db->update('users', $data);
    }
  //kani
    public function updateUserSubmission($data, $submission_id) {
        $this->db->where('userid', $submission_id);
        $this->db->update('user_submission', $data);
    }

      //kani
    public function getUserById($userId) {
        $query = $this->db->get_where('users', array('userid' => $userId));
        return $query->row_array();
    }

      //kani
    public function getSubmissionId($userId) {
        $this->db->select('userid');
        $this->db->from('users');
        $this->db->where('userid', $userId);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->submission_id;
        } else {
            return false;
        }
    }
    
}
?>
