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
        if ($notices_firm = $this->notice_model->getbytype('firm')) {
            $this->data['notices_firm'] = $notices_firm;
        };
        if ($this->session->userdata('user_level') == 1) {
            $this->data['page_content'] = 'notice/index/1';
        } else {
            $this->data['page_content'] = 'notice/index/others';
        }

        $this->load->view('templates/page', $this->data);
    }

    public function add() {
        if ($this->accesscontrol->access_check()) {
            $this->data['page_content'] = 'notice/add';
            $this->load->view('templates/page', $this->data);
        }
    }

    public function type() {
        if ($this->accesscontrol->access_check()) {
            if (!($type = $this->uri->segment(3))) {
                redirect('notice/index');
            } else {
                $result = $this->notice_model->getbytype($this->uri->segment(3));
            }
            $this->data['type'] = $type;
            $this->data['notices'] = $result;
            $this->data['page_content'] = 'notice/type';
            $this->load->view('templates/page', $this->data);
        }
    }

    public function view() {
        if ($this->accesscontrol->access_check()) {
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

}
?>
