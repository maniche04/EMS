<?php

class Login extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->data = array(
            'title' => $this->config->item('site_short_name') . ' : Login',
        );
    }

    public function index() {
        $this->load->view('login_view', $this->data);
    }

    public function doLogin() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            //VALIDATION FAILED
            $this->data['errors'] = validation_errors();
            $this->index();
        } else {
            //VALIDATION SUCCESS! NOW DATABASE CHECK AND THROW ERROR OR LOGIN SUCCESSFULLY!
            $input_username = $this->input->post('username');
            $input_password = $this->input->post('password');
            if ($this->user->authenticate($input_username, $input_password)) {
                redirect('home');
            } else {
                $this->data['errors'] = "<br> Invalid login credentials!";
                $this->index();
            }
        }
    }

    public function doLogout() {

        $this->session->unset_userdata('logged_in');

        redirect('login');
    }

}

?>
