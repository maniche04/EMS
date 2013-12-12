<?php

class Notice extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        $this->load->model('notice_model');
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
        $this->data['page_content'] = 'notice/overview';
        $this->load->view('templates/page', $this->data);
    }

    public function add() {
        if ($this->accesscontrol->access_check()) {
            $this->data['page_content'] = 'notice/add';
            $this->load->view('templates/page', $this->data);
        }
    }

    public function go() {
        $valid_go = array('firm', 'client', 'assignment');
        if (!($type = $this->uri->segment(3))) {
            redirect('notice');
        } else {
            if (in_array($type, $valid_go)) {
                $result = $this->notice_model->getbytype($this->uri->segment(3));
                $this->data['type'] = $type;
                $this->data['notices_firm'] = $result;
                if ($this->uri->segment(4) == 'ajax') {
                    $this->load->view('notice/type', $this->data);
                } else {
                    $this->data['autoload'] = $type;
                    $this->index();
                }
            } else {
                redirect('notice');
            }
        }
    }

    public function view() {
        if (!($type = $this->uri->segment(3))) {
            redirect('notice/index');
        } else {
            $result = $this->notice_model->getbyid($this->uri->segment(3));
        }
        $this->data['notice'] = $result;
        $this->data['page_content'] = 'notice/view';
        $this->load->view('templates/page', $this->data);
    }

}
?>
