<?php

class About extends CI_Controller {
    
    public $data;
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        } else {
            $this->data = array(
                'show_header' => true,
                'title' => 'About Us',
                'username' => $this->session->userdata('username'),
                'css' => 'main',
                'site_name' => $this->config->item('site_name'),
                'logo_url' => $this->config->item('logo_url'),
            );
        }
    }

    public function index() {
        $this->data['page_content'] = 'about/index' ;
        $this->load->view('templates/page',$this->data);
    }

    public function developer() {
        $this->data['page_content'] = 'about/developer' ;
        $this->load->view('templates/page',$this->data);
    }

}

?>
