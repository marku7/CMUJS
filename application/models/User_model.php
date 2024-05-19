<?php
    class User_model extends CI_Model{
        
        public function __construct()
        {
            $this->load->database();
        }

        public function get_users($id = FALSE){

            if($id === FALSE){
                $query = $this->db->get('users');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('users', array('userid' => $id));
            return $query->row_array();
        }

        public function remove_user($userId) {
            return $this->db->delete('users', array('userid' => $userId));
        }

        public function disable_user($userId) {
            $this->db->where('userid', $userId);
            return $this->db->update('users', ['status' => 0]);
        }

        public function enable_user($userId) {
            $this->db->where('userid', $userId);
            return $this->db->update('users', ['status' => 1]);
        }
        
        public function authenticate_user($email, $password) {
            $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));

            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return false;
            }

        }
        
}
?>