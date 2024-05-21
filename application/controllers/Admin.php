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

    public function addArticle() {
        $data['active_page'] = 'article';

        $query = $this->db->get('volume');
        $volumes = $query->result_array();

        $data['volumes'] = $volumes;
        
        $data['articles_content'] = 'admin/addArticle';
        $this->load->helper(array('form', 'url'));
        $this->load->view('templates/adminheader', $data);
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('keywords', 'keywords', 'required');
        $this->form_validation->set_rules('doi', 'DOI', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/addArticle', $data); 
        }
        else
        {
            $this->load->model('article_model'); 
            if ($this->article_model->add_article()) { 
                redirect('admin/article');
            } else {
                echo "Failed to add article!";
            }
        }
        
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/adminfooter', $data);
    }

    public function addVolume() {
        $data['active_page'] = 'volume';
        $data['users_content'] = 'admin/addVolume';
        $this->load->helper(array('form', 'url'));
        $this->load->view('templates/adminheader', $data);
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/addVolume', $data); 
        }
        else
        {
            $this->load->model('volume_model'); 
            if ($this->volume_model->add_volume()) { 
                redirect('admin/volume');
            } else {
                echo "Failed to add volume!";
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

    public function removeVol($volumeID) {
        $result = $this->volume_model->remove_vol($volumeID);
    
        if ($result) {
            redirect('admin/volume');
        } else {
            echo "Failed to remove volume!";
        }
    }

    public function disableUser($userId) {
        $this->load->model('user_model');
        $result = $this->user_model->disable_user($userId);
    
        if ($result) {
            redirect('admin/user');
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function enableUser($userId) {
        $this->load->model('user_model');
        $result = $this->user_model->enable_user($userId);
    
        if ($result) {
            redirect('admin/user');
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function editUser($userId) {
        $data['userId'] = $userId;
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

    public function updateNow($userId) {
        $page['active_page'] = 'user';
        $data['users'] = 'admin/updateNow';
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->crud_user_model->getUserById($userId);

            $this->load->view('templates/adminheader');
            $this->load->view('admin/editUser', $data);
            $this->load->view('admin/sidebar', $page);
            $this->load->view('templates/adminfooter');
        } else {
            $submission_data = array(
                'email' => $this->input->post('email'),
                'complete_name' => $this->input->post('name'),
                'pword' => $this->input->post('password'),
            );
            $this->crud_user_model->updateUser($submission_data, $userId);

            $submission_id = $this->crud_user_model->getSubmissionId($userId);
            if ($submission_id) {
                $this->crud_user_model->updateUserSubmission($submission_data, $submission_id);
            }

            redirect(base_url('admin/user'));
        }
    }

    public function updateArt($articleId) {
        $page['active_page'] = 'article';
        $data['articles'] = 'admin/updateArt';
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $this->form_validation->set_rules('doi', 'Abstract', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['article'] = $this->article_model->getArticleById($articleId);
            $data['volume_names'] = $this->article_model->get_volume_names();

            $this->load->view('templates/adminheader');
            $this->load->view('admin/editArticle', $data);
            $this->load->view('admin/sidebar', $page);
            $this->load->view('templates/adminfooter');
        } else {
            $submission_data = array(
                'title' => $this->input->post('title'),
                'keywords' => $this->input->post('keywords'),
                'abstract' => $this->input->post('abstract'),
                'doi' => $this->input->post('doi'),
                'volumeid' => $this->input->post('volumeid'),
            );
    
            $this->article_model->updateArt($submission_data, $articleId);
    
            $submission_id = $this->article_model->getSubmissionId($articleId);
            if ($submission_id) {
                $this->article_model->updateArticleSubmission($submission_data, $submission_id);
            }
    
            redirect(base_url('admin/article'));
        }
    }
    
    
    public function editVolume($volumeID){
        echo "Received volumeID: ". $volumeID;
        $data['volume'] = $this->volume_model->get_volumes($volumeID);

        if (empty($data['volume'])){
            show_404();
        }

        $data['title'] = 'Edit Volume';

        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/editVolume', $data);
        $this->load->view('templates/adminfooter', $data);
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

    public function viewArt($articleId = NULL) {
        $data['active_page'] = 'article';
        $data['article'] = $this->article_model->get_articles($articleId); 
        $data['view_article'] = 'admin/viewArticle';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $this->load->view($data['view_article'], $data);
        $this->load->view('templates/adminfooter', $data);
    }

    public function viewVolume($volumeid = NULL) {
        $data['active_page'] = 'volume';
        $data['volume'] = $this->volume_model->get_volumes($volumeid); 
        $data['view_volume'] = 'admin/viewVolume';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $this->load->view($data['view_volume'], $data);
        $this->load->view('templates/adminfooter', $data);
    }

    public function viewAuthor($authorID = NULL) {
        $data['active_page'] = 'author';
        $data['author'] = $this->author_model->get_authors($authorID); 
        $data['view_author'] = 'admin/viewAuthor';
        $this->load->helper('url');
        $this->load->view('templates/adminheader', $data);
        $this->load->view($data['view_author'], $data);
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

    public function publishVolume($volumeid) {
        $this->load->model('volume_model');
        $result = $this->volume_model->publish_volume($volumeid);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
    public function unpublishVolume($volumeid) {
        $this->load->model('volume_model');
        $result = $this->volume_model->unpublish_volume($volumeid);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
    public function removeAuthor($authID) {
        $result = $this->author_model->remove_author($authID);
    
        if ($result) {
            redirect('admin/author');
        } else {
            echo "Failed to remove author!";
        }
    }

    public function disableAuthor($authID) {
        $this->load->model('article_model');
        $result = $this->article_model->disableAuthor($authID);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function removeArticle($articleID) {
        $result = $this->article_model->remove_article($articleID);
    
        if ($result) {
            redirect('admin/article');
        } else {
            echo "Failed to remove article!";
        }
    }

    public function removeArchive($articleID) {
        $result = $this->article_model->remove_article($articleID);
    
        if ($result) {
            redirect('admin/archive');
        } else {
            echo "Failed to remove archive!";
        }
    }

    public function tagArticle($articleId) {
        $this->load->model('article_model');
        $result = $this->article_model->tag_article($articleId);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function untagArticle($articleId) {
        $this->load->model('article_model');
        $result = $this->article_model->untag_article($articleId);
    
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}
?>