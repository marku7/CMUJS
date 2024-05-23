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

    public function get_arc($id = FALSE) {
        $this->db->select('articles.*, volume.vol_name')
                 ->from('articles')
                 ->join('volume', 'articles.volumeid = volume.volumeid', 'left')
                 ->where('articles.isArchive', 1);
        
        if ($id !== FALSE) {
            $this->db->where('articles.articleid', $id);
            $result = $this->db->get()->row_array();
        } else {
            $result = $this->db->get()->result_array();
        }
        
        return $result;
    }
}

?>