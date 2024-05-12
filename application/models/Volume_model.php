<?php
    class Volume_model extends CI_Model{
        
        public function __construct()
        {
            $this->load->database();
        }

        public function get_volumes($id = FALSE){

            if($id === FALSE){
                $query = $this->db->get('volumes');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('volumes', array('volumeID' => $id));
            return $query->row_array();
        }
}
?>