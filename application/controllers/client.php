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
                'show_header' => true,
                'title' => 'EMS: Client',
                'username' => $this->session->userdata('username'),
                'css' => 'main',
                'site_name' => $this->config->item('site_name'),
                'logo_url' => $this->config->item('logo_url'),
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

}

?>
