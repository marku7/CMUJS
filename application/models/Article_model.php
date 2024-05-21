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

        public function get_articles_home($id = FALSE) {
            $this->db->select('*')
                     ->from('articles')
                     ->where('isArchive', 0)
                     ->where('feature', 1)
                     ->where('isPublished', 1);
        
            if ($id !== FALSE) {
                $this->db->where('articleid', $id);
            }
        
            $result = $this->db->get()->result_array();
        
            return $result;
        }

        public function get_articles_art($id = FALSE) {
            $this->db->select('*')
                     ->from('articles')
                     ->where('isArchive', 0)
                     ->where('isPublished', 1);
        
            if ($id !== FALSE) {
                $this->db->where('articleid', $id);
            }
        
            $result = $this->db->get()->result_array();
        
            return $result;
        }

        public function get_archive_articles($id = FALSE){
    
            $query = $this->db->select('*')
                              ->from('articles');
            $query->where('isArchive', 1);
    
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
        
        public function add_article(){
            $data = array(
                'articleid' => $this->input->post('articleid'),
                'title' => $this->input->post('title'),
                'abstract' => $this->input->post('abstract'),
                'keywords' => $this->input->post('keywords'),
                'doi' => $this->input->post('doi'),
                'volumeid' => $this->input->post('volumeid'),
                'isArchive' => 0,
                'isPublished' => 0 
            );
            return $this->db->insert('articles', $data);
        }

        public function tag_article($articleId) {
            $this->db->where('articleid', $articleId);
            return $this->db->update('articles', ['feature' => 1]);
        }

        public function untag_article($articleId) {
            $this->db->where('articleid', $articleId);
            return $this->db->update('articles', ['feature' => 0]);
        }
        
        
    }
    
?>