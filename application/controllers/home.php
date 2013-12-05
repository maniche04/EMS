<?php

class Home extends CI_Controller {
    
    public $data;
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        } else {
            $this->data = array(
                'show_header' => true,
                'title' => 'Home',
                'username' => $this->session->userdata('username'),
                'css' => 'main',
                'site_name' => $this->config->item('site_name'),
                'logo_url' => $this->config->item('logo_url'),
            );
        }
    }

    public function index() {
        $this->data['page_content'] = 'home_index' ;
        $this->load->view('templates/page',$this->data);
    }

    
}

?>
