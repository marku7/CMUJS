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
}
?>
