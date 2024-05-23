<?php
    class Volume_model extends CI_Model{
        
        public function __construct()
        {
            $this->load->database();
        }

        public function get_volumes($id = FALSE){
            if ($id === FALSE) {
                $this->db->where('isArchived', 0);
                $query = $this->db->get('volume');
                return $query->result_array();
            }
        
            $this->db->where(array('volumeid' => $id, 'isArchived' => 0));
            $query = $this->db->get('volume');
            return $query->row_array();
        }
        

        public function get_articles_by_volume($volumeid)
        {
            $this->db->where('volumeid', $volumeid);
            $query = $this->db->get('articles');
            return $query->result_array();
        }

        public function add_volume(){
            $data = array(
                'vol_name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'published' => 0,
                'isArchived' => 0
            );
            return $this->db->insert('volume', $data);
        }

        public function editVolume($volumeID){
            echo "Received volumeID: ". $volumeID;
            $data = array(
                'vol_name' => $this->input->post('volname'),
                'description' =>$this->input->post('description')
            );

            $this->db->where('id', $this->input->post('volumeID'));
            return $this->db->update('volume', $data);
        }

        public function remove_vol($volumeID) {
            $this->db->trans_start();
        
            $this->db->delete('articles', array('volumeid' => $volumeID));
        
            $this->db->delete('volume', array('volumeid' => $volumeID));
       
            $this->db->trans_complete();

            return $this->db->trans_status();
        }
        

        public function publish_volume($volumeID) {
            $this->db->where('volumeid', $volumeID);
            return $this->db->update('volume', ['published' => 1]);
        }
        
        public function unpublish_volume($volumeID) {
            $this->db->where('volumeid', $volumeID);
            return $this->db->update('volume', ['published' => 0]);
        }

        public function archive_volume($volumeID) {
            $this->db->where('volumeid', $volumeID);
            return $this->db->update('volume', [
                'isArchived' => 1,
                'published' => 0
            ]);
        }        
}
?>