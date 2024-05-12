<?php
class Total_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_total_users() {
        $query = $this->db->query("SELECT COUNT(*) as total_users FROM users");
        $result = $query->row_array();
        return $result['total_users'];
    }

    public function get_total_articles() {
        $query = $this->db->query("SELECT COUNT(*) as total_articles FROM articles");
        $result = $query->row_array();
        return $result['total_articles'];
    }

    public function get_total_archives() {
        $query = $this->db->query("SELECT COUNT(*) as total_archives FROM archives");
        $result = $query->row_array();
        return $result['total_archives'];
    }

    public function get_total_authors() {
        $query = $this->db->query("SELECT COUNT(*) as total_authors FROM authors");
        $result = $query->row_array();
        return $result['total_authors'];
    }
}
?>
