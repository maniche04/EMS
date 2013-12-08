<?php

class Error extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        } else {
            $this->data = array(
                'title' => 'ERROR!',
                'username' => $this->session->userdata('username'),
                'first_name' => $this->session->userdata('first_name')
            );
        }
    }

    public function index() {
        redirect('home');
    }

    public function access() {
        $this->data['title'] = 'Access Denied';
        $this->data['error_message'] = "You do not have enough privileges to visit the requested section. If you believe you're seeing this by error, kindly contact your super administrator.";
        $this->load->view('templates/error', $this->data);
    }

}

?>
