<?php

class Login extends CI_Controller {

    public $header;

    public function __construct() {
        parent::__construct();
        $this->header = array(
            'show_header' => false,
            'title' => 'Dev EMS: Login',
            'css' => 'login',
            'logo_url' => $this->config->item('logo_url'),
            'site_name' => $this->config->item('site_name'),
            'username' => ""
        );
    }

    public function index() {
        $this->load->view('templates\header', $this->header);
        $this->load->view('login_view');
    }

    public function doLogin() {
        //CHECK THE LOGIN DETAILS HERE

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $username = $this->input->post('username') ? $this->input->post('username') : "";

        $this->header['username'] = $username;

        if ($this->form_validation->run() === FALSE) {
            //VALIDATION FAILED
            $this->header['errors'] = validation_errors();
            $this->index();
        } else {
            //VALIDATION SUCCESS! NOW DATABASE CHECK AND THROW ERROR OR LOGIN SUCCESSFULLY!
            //DATABASE CHECK
            $this->load->model('user');
            $input_username = $this->input->post('username');
            if (User::findByUsername($input_username)) {
                //USER FOUND, NOW CHECK THE PASSWORD
                $user = User::findByUsername($input_username);
                $input_password = $this->input->post('password');
                if ($user->password == $input_password) {
                    //LOGIN SUCCESS!
                    $session_data = array(
                        'logged_in' => true,
                        'userid' => $user->id,
                        'username' => $user->username
                    );
                    $this->session->set_userdata($session_data);
                    redirect('about');
                } else {
                    $this->header['errors'] = "<br> Invalid login credentials!";
                    $this->index();
                }
            } else {
                //USER NOT FOUND
                $this->header['errors'] = "<br>Invalid login credentials!";
                $this->index();
            }
        }
    }

    public function doLogout() {

        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('username');

        redirect('login');
    }

}

?>
