<?php

class News extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        $this->load->model('news_model');
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
        //need to restrict this to the administrators
        $this->data['page_content'] = 'news/overview';
        $this->load->view('templates/page', $this->data);
    }

    public function go() {
        //need to restrict this to the administrators       
        //takes to the specified staff
    }

}

?>
