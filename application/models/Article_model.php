<?php
    class Article_model extends CI_Model{

        public function __construct()
        {
            $this->load->database();
        }
    
        public function get_articles($id = FALSE){
    
            $query = $this->db->select('*')
                              ->from('articles');
            $query->where('isArchive', 0);
    
            if($id!== FALSE){
                $query->where('articleid', $id);
            }
    
            $result = $query->get()->result_array();
    
            return $result;
        }

        public function remove_article($articleID) {
            return $this->db->delete('articles', array('articleid' => $articleID));
        }

        public function archive_article($articleId) {
            $this->db->where('articleid', $articleId);
            return $this->db->update('articles', ['isArchive' => 1]);
        }

        public function unarchive_article($articleId) {
            $this->db->where('articleid', $articleId);
            return $this->db->update('articles', ['isArchive' => 0]);
        }
        
        public function publish_article($articleId) {
            $this->db->where('articleid', $articleId);
            return $this->db->update('articles', ['isPublished' => 1]);
        }
        
        public function unpublish_article($articleId) {
            $this->db->where('articleid', $articleId);
            return $this->db->update('articles', ['isPublished' => 0]);
        }
        
        
    }
    
?>