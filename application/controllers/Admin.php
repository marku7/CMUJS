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

    public function archive() {
        $data['active_page'] = 'archive';
        $data['archives_content'] = 'admin/archives';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $data['archives'] = $this -> archive_model-> get_archives(); 
        $this->load->view($data['archives_content'], $data);
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
        $this->load->helper(array('form', 'url'));
        $this->load->view('templates/adminheader', $data);
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/addUser', $data); 
        }
        else
        {
            $this->load->model('crud_user_model'); 
            if ($this->crud_user_model->add_user()) { 
                redirect('admin/user');
            } else {
                echo "Failed to add user!";
            }
        }
        
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/adminfooter', $data);
    }

    public function removeUser($userId) {
        $result = $this->user_model->remove_user($userId);
    
        if ($result) {
            redirect('admin/user');
        } else {
            echo "Failed to remove user!";
        }
    }

    public function editUser($userId) {
        $data['userId'] = $userId;
        echo 'Received userId: '. $userId;
        echo "In editUser method with userId: $userId<br>";
        $data['active_page'] = 'user';
        $data['users_content'] = 'admin/editUser';
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('crud_user_model'); 
        $data['user'] = $this->crud_user_model->get_user_by_id($userId);
    
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/adminheader', $data);
            $this->load->view('admin/editUser', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('templates/adminfooter', $data);
        }
        else
        {
            if ($this->crud_user_model->editUser($userId)) { 
                redirect('admin/user');
            } else {
                echo "Failed to edit user!";
            }
        }
    }
    
    public function viewUser($userId = NULL) {
        $data['active_page'] = 'user';
        $data['user'] = $this->user_model->get_users($userId); 
        $data['view_user'] = 'admin/viewUser';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $this->load->view($data['view_user'], $data);
       
        $this->load->view('templates/adminfooter', $data);
    }

    public function archiveArticle($articleId) {
        $this->load->model('article_model');
        $result = $this->article_model->archive_article($articleId);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function unarchiveArticle($articleId) {
        $this->load->model('article_model');
        $result = $this->article_model->unarchive_article($articleId);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
    public function publishArticle($articleId) {
        $this->load->model('article_model');
        $result = $this->article_model->publish_article($articleId);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
    public function unpublishArticle($articleId) {
        $this->load->model('article_model');
        $result = $this->article_model->unpublish_article($articleId);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
    
}
?>