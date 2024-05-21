<?php
class Pages extends CI_Controller {

    public function view($page = 'home') {
        $this->load->helper('url');
        $this->load->model('article_model');

        $data['title'] = ucfirst($page);
        $data['active_page'] = $page;

        if ($page == 'articles') {
            $data['articles'] = $this->article_model->get_articles_art();
        } else {
            $data['articles'] = $this->article_model->get_articles_home();
        }

        $data['archives'] = $this->article_model->get_archive_articles();
        $data['volumes'] = $this->volume_model->get_volumes();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('pages/' . $page, $data); 
        $this->load->view('templates/footer', $data);
    }

    public function viewArticle($id) {
        $this->load->helper('url');
        $this->load->model('article_model');

        $data['active_page'] = 'articles';

        $data['article'] = $this->article_model->get_articles_view($id);
        if (empty($data['article'])) {
            show_404();
        }

        $data['title'] = $data['article']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/viewnav', $data);
        $this->load->view('pages/viewArticle', $data);
        $this->load->view('templates/viewfoot', $data);
    }

    public function viewArchive($id) {
        $this->load->helper('url');
        $this->load->model('article_model');
    
        $data['active_page'] = 'archives';
    
        $data['article'] = $this->article_model->get_archive_view($id);
        if (empty($data['article'])) {
            show_404();
        }
    
        $data['title'] = $data['article']['title'];
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/viewnav', $data);
        $this->load->view('pages/viewArchive', $data);
        $this->load->view('templates/viewfoot', $data);
    }
    
}
?>
