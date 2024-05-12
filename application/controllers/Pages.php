<?php
class Pages extends CI_Controller {

    public function view($page = 'home') {
        $data['title'] = ucfirst($page);

        $data['active_page'] = $page;
        
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('pages/'.$page, $data); 
        $this->load->view('templates/footer', $data);
    }
}
?>
