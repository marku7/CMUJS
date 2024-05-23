<?php
   class Archive_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_archives($id = FALSE) {
        $this->db->select('*')
                 ->from('volume')
                 ->where('isArchived', 1);
    
        if ($id !== FALSE) {
            $this->db->where('volumeid', $id);
        }
    
        $query = $this->db->get();
    
        if ($id !== FALSE) {
            return $query->row_array();
        }
    
        return $query->result_array();
    }

    public function get_articles_by_volume($volumeid)
    {
        $this->db->where('volumeid', $volumeid);
        $query = $this->db->get('articles');
        return $query->result_array();
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