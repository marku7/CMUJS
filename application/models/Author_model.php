<?php
    class Author_model extends CI_Model{
        
        public function __construct()
        {
            $this->load->database();
        }

        public function get_authors($id = FALSE){

            if($id === FALSE){
                $query = $this->db->get('authors');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('authors', array('authorID' => $id));
            return $query->row_array();
        }
}
?>