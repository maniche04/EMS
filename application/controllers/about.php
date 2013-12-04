<?php

class About extends CI_Controller{
    
    public function index(){
        $this->load->view('about/index');
    }
    
    public function server(){
        $this->load->view('about/server_view');
    }
}
?>
