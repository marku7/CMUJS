<?php
    class Article_model extends CI_Model{
        
        public function __construct()
        {
            $this->load->database();
        }

        public function get_articles($id = FALSE){

            if($id === FALSE){
                $query = $this->db->get('articles');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('articles', array('articleid' => $id));
            return $query->row_array();
        }
}
?>