<?php
    class Article_model extends CI_Model{

        public function __construct()
        {
            $this->load->database();
        }
    
        public function get_articles($id = FALSE) {
            $this->db->select('articles.*, volume.vol_name')
                     ->from('articles')
                     ->join('volume', 'articles.volumeid = volume.volumeid', 'left')
                     ->where('articles.isArchive', 0);
            
            if ($id !== FALSE) {
                $this->db->where('articles.articleid', $id);
                $result = $this->db->get()->row_array();
            } else {
                $result = $this->db->get()->result_array();
            }
            
            return $result;
        }
        

        public function get_articles_home($id = FALSE) {
            $this->db->select('articles.*')
                     ->from('articles')
                     ->join('volume', 'articles.volumeid = volume.volumeid')
                     ->where('articles.isArchive', 0)
                     ->where('articles.feature', 1)
                     ->where('articles.isPublished', 1)
                     ->where('volume.published', 1);
        
            if ($id !== FALSE) {
                $this->db->where('articles.articleid', $id);
                $result = $this->db->get()->row_array();
            } else {
                $result = $this->db->get()->result_array();
            }
        
            return $result;
        }
        
        public function get_articles_view($id = FALSE) {
            $this->db->select('*')
                     ->from('articles')
                     ->where('isArchive', 0)
                     ->where('isPublished', 1);
        
            if ($id !== FALSE) {
                $this->db->where('articles.articleid', $id);
                $result = $this->db->get()->row_array();
            } else {
                $result = $this->db->get()->result_array();
            }
        
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

        public function get_archive_view($id) {
            $this->db->select('articles.*')
                     ->from('articles')
                     ->join('volume', 'articles.volumeid = volume.volumeid')
                     ->where('articles.isArchive', 1)
                     ->where('volume.published', 1)
                     ->where('articles.articleid', $id);
        
            $query = $this->db->get();
        
            // Return a single record instead of an array of records
            return $query->row_array();
        }
        

        public function get_archive_articles($id = FALSE) {
            $this->db->select('articles.*')
                     ->from('articles')
                     ->join('volume', 'articles.volumeid = volume.volumeid')
                     ->where('articles.isArchive', 1)
                     ->where('volume.published', 1);
        
            if ($id !== FALSE) {
                $this->db->where('articles.articleid', $id);
            }
        
            $result = $this->db->get()->result_array();
        
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
                'feature' => 0,
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

        public function getArtId($articleId) {
            $this->db->select('articleid');
            $this->db->where('articleid', $articleId);
            $query = $this->db->get('article_submission');
            $result = $query->row();
        
            if ($result) {
                return $result->submissionid;
            } else {
                return null;
            }
        }

        public function updateArt($data, $articleId) {
            $this->db->where('articleid', $articleId);
            $this->db->update('articles', $data);
        }
    
        public function updateArticleSubmission($data, $submission_id) {
            $this->db->where('articleid', $submission_id);
            $this->db->update('article_submission', $data);
        }
    
        public function getArticleById($articleId) {
            $query = $this->db->get_where('articles', array('articleid' => $articleId));
            return $query->row_array();
        }

        public function get_volume_names() {
            $query = $this->db->select('volumeid, vol_name')->get('volume');
            return $query->result_array();
        }        
    
        public function getSubmissionId($articleId) {
            $this->db->select('articleid');
            $this->db->from('articles');
            $this->db->where('articleid', $articleId);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                return $query->row()->submission_id;
            } else {
                return false; 
            }
        }
        
        
    }
    
?>