<?php
    class Volume_model extends CI_Model{
        
        public function __construct()
        {
            $this->load->database();
        }

        public function get_volumes($id = FALSE){

            if($id === FALSE){
                $query = $this->db->get('volume');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('volume', array('volumeid' => $id));
            return $query->row_array();
        }

        public function add_volume(){
            $data = array(
                'vol_name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
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
            return $this->db->delete('volume', array('volumeid' => $volumeID));
        }
}
?>