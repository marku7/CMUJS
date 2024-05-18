<?php
   class Archive_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_archives($id = FALSE){

        $query = $this->db->select('*')
                          ->from('articles');

        $query->where('isArchive', 1);

        if($id!== FALSE){
            $query->where('articleid', $id);
        }

        $result = $query->get()->result_array();

        return $result;
    }
}

?>