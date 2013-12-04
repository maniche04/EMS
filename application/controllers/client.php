<?php

class Client extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        //The idex page for the partners, managers and other staffs
    }
    
    function all(){
        //same as index
    }
    
    function name($ClientCode){
        //Will directly look for a ClientCode and show, if not authorized, will return error!
        
        //IF AUTHORIZED?? CHECKS HERE
        
        //OK AUTHORIZED!
        $header = array(
            'title' => 'Client Details: Client Name'
        );
        $this->load->view('client\overview_1');
    }
    
    function add(){
        //Allow only for the partners to create
    }
}

?>
