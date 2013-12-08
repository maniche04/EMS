<?php

class Client extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        } else {
            $this->load->model('clients');
            $this->data = array(
                'title' => $this->config->item('site_short_name') . ' : Client',
                'nav_links' => $this->accesscontrol->navbar_links()
            );
        }
    }

    public function index() {
        $this->data['page_content'] = 'client/all';
        $this->load->view('templates/page', $this->data);
    }

    public function go($identifier) {

        if (!isset($identifier)) {
            redirect('client');
        } else {
            $identifier = trim($identifier);
        }
        if (is_integer($identifier)) {
            //is an integer
            //lookup and redirect
            $this->data['page_content'] = 'client/overview';
            $this->load->view('templates/page', $this->data);
        } elseif (is_string($identifier)) {
            //is a string
            //lookup and redirect
            if ($clientdata = $this->clients->findByShortName($identifier)) {
                $this->data['records'] = $clientdata;
                $this->data['page_content'] = 'client/overview';
                $this->load->view('templates/page', $this->data);
            } else {
                redirect('client');
            }
        } else {
            //NOTHING
            redirect('client');
        }
    }

    public function add() {
        if ($this->accesscontrol->access_check()) {
            $this->data['title'] = 'Add Client';
            $this->data['page_content'] = 'client/add';
            $this->load->view('templates/page', $this->data);
        }
    }

}

?>
