<?php

class Assignment  extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        $this->load->model('assignment_model');
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        } else {
            $this->data = array(
                'title' => 'Notice',
                'username' => $this->session->userdata('username'),
            );
        }
    }

    public function index() {
        $this->data['page_content'] = 'assignment/overview';
        $this->load->view('templates/page', $this->data);
    }

    public function go() {
       //takes to the specified assignment
    }

    public function view() {
        //takes to the specific assignment
    }

}
?>
