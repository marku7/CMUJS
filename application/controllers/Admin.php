<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Total_model');
    }

    public function index() {
        $data['title'] = 'Administrator';
        $data['active_page'] = 'dashboard';

        $data['total_users'] = $this->total_model->get_total_users();
        $data['total_articles'] = $this->total_model->get_total_articles();
        $data['total_archives'] = $this->total_model->get_total_archives();
        $data['total_authors'] = $this->total_model->get_total_authors();

        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/index', $data); 
        $this->load->view('admin/sidebar', $data); 
        $this->load->view('templates/adminfooter', $data);
    }
    
    public function user() {
        $data['active_page'] = 'user';
        $data['users_content'] = 'admin/user';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $data['users'] = $this -> user_model-> get_users(); 
        $this->load->view($data['users_content'], $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/adminfooter', $data);
    }

    public function article() {
        $data['active_page'] = 'article';
        $data['articles_content'] = 'admin/articles';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $data['articles'] = $this -> article_model-> get_articles(); 
        $this->load->view($data['articles_content'], $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/adminfooter', $data);
    }

    public function author() {
        $data['active_page'] = 'author';
        $data['authors_content'] = 'admin/authors';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $data['authors'] = $this -> author_model-> get_authors(); 
        $this->load->view($data['authors_content'], $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/adminfooter', $data);
    }

    public function volume() {
        $data['active_page'] = 'volume';
        $data['volumes_content'] = 'admin/volumes';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $data['volumes'] = $this -> volume_model-> get_volumes(); 
        $this->load->view($data['volumes_content'], $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/adminfooter', $data);
    }

    public function addUser() {
        $data['active_page'] = 'user';
        $data['users_content'] = 'admin/addUser';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $data['users'] = $this -> user_model-> get_users(); 
        $this->load->view($data['users_content'], $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/adminfooter', $data);
    }
}
?>
