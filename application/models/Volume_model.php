<?php
    class Volume_model extends CI_Model{
        
        public function __construct()
        {
            $this->load->database();
        }

        public function get_volumes($id = FALSE) {
            $this->db->where('isArchived', 0);
            
            if ($id === FALSE) {
                $query = $this->db->get('volume');
                return $query->result_array();
            } else {
                $this->db->where('volumeid', $id);
                $query = $this->db->get('volume');
                return $query->row_array();
            }
        }

        public function get_volumes_home($id = FALSE) {
            $this->db->where('isArchived', 0);
            $this->db->where('published', 1);
            
            if ($id === FALSE) {
                $query = $this->db->get('volume');
                return $query->result_array();
            } else {
                $this->db->where('volumeid', $id);
                $query = $this->db->get('volume');
                return $query->row_array();
            }
        }
               

        public function get_volume($id) {
            $query = $this->db->get_where('volume', array('volumeid' => $id, 'isArchived' => 0));
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
            $this->db->trans_start();
            $this->db->where('volumeid', $volumeID);
            $this->db->update('volume', ['published' => 1]);
        
            $this->db->where('volumeid', $volumeID);
            $this->db->update('articles', ['isPublished' => 1]);
        
            $this->db->trans_complete();
            return $this->db->trans_status();
        }
        
        public function unpublish_volume($volumeID) {
            $this->db->trans_start();
            $this->db->where('volumeid', $volumeID);
            $this->db->update('volume', ['published' => 0]);
        
            $this->db->where('volumeid', $volumeID);
            $this->db->update('articles', ['isPublished' => 0]);
        
            $this->db->trans_complete();
            return $this->db->trans_status();
        }
        
        public function archive_volume($volumeID) {
            $this->db->trans_start();
            $this->db->where('volumeid', $volumeID);
            $this->db->update('volume', ['isArchived' => 1, 'published' => 0]);
        
            $this->db->where('volumeid', $volumeID);
            $this->db->update('articles', ['isArchive' => 1, 'isPublished' => 0]);
        
            $this->db->trans_complete();
            return $this->db->trans_status();
        }
        
        public function unarchive_volume($volumeID) {
            $this->db->trans_start();
            $this->db->where('volumeid', $volumeID);
            $this->db->update('volume', ['isArchived' => 0, 'published' => 1]);

            $this->db->where('volumeid', $volumeID);
            $this->db->update('articles', ['isArchive' => 0, 'isPublished' => 1]);
        
            $this->db->trans_complete();
            return $this->db->trans_status();
        }
          

        public function deleteArc($volumeID) {
            $this->db->trans_start();
        
            $this->db->delete('articles', array('volumeid' => $volumeID));
        
            $this->db->delete('volume', array('volumeid' => $volumeID));
       
            $this->db->trans_complete();

            return $this->db->trans_status();
        }
  
        public function updateVolumeSubmission($data, $submission_id) {
            $this->db->where('volumeid', $submission_id);
            $this->db->update('volume_submission', $data);
        }

          public function updateVol($data, $volumeID) {
            $this->db->where('volumeid', $volumeID);
            $this->db->update('volume', $data);
        }

        public function getVolumeById($volumeID) {
            $query = $this->db->get_where('volume', array('volumeid' => $volumeID));
            return $query->row_array();
        }

        public function get_volume_names() {
            $query = $this->db->select('volumeid, vol_name')->get('volume');
            return $query->result_array();
        }        

        public function getSubmissionId($volumeID) {
            $this->db->select('volumeid');
            $this->db->from('volume');
            $this->db->where('volumeid', $volumeID);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                return $query->row()->submission_id;
            } else {
                return false; 
            }
        }
}
?>