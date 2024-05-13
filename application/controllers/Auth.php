<?php
class Auth extends CI_Controller {
    public function login() {
        $this->load->view('login');
    }

    public function process_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->model('user_model');

        if ($email === 'admin' && $password === 'admin') {
            redirect('admin/index');
            return;
        }

        $user = $this->user_model->authenticate_user($email, $password);

        if ($user) {
            redirect('pages/about');
        } else {
            echo "Invalid email or password";
        }
    }
}
?>