<?php

class Accesscontrol extends CI_Model {

    public $access_level_text;
    public $access_level;

    function __construct() {
        parent::__construct();
        $this->access_level_text = $this->access_level_text();
        //$this->access_level = $this->user->user_level;   NOT WORKING! WHY?
        $this->access_level = $this->session->userdata('user_level');
    }

    public function access_level_text() {
        $num = $this->user->user_level;
        if ($num == 1) {
            return "Partner";
        } elseif ($num == 2) {
            return "Manager";
        } elseif ($num == 3) {
            return "Staff";
        } else {
            return "Unknown";
        }
    }

    public function access_check() {
        $controller = $this->uri->segment(1);
        if (!($function = $this->uri->segment(2))) {
            $function = 'index';
        }
        $user_level = "level_" . $this->access_level;
        $sql = "SELECT * FROM access_control ";
        $sql .= "WHERE `controller` = '" . $controller . "' ";
        $sql .= "AND `function` = '" . $function . "' ";
        $q = $this->db->query($sql);

        if ($q->num_rows() == 1) {
            $data = $q->first_row('array');
            if ($data[$user_level] == 1) {
                return true;
            } else {
                redirect('error/access');
            }
        } else {
            redirect('error/access');
        }
    }

    public function navbar_links() {
        $controller = $this->uri->segment(1);

        $query = $this->db->order_by('sort_id', 'asc');
        $query = $this->db->where('controller', $controller);
        $query = $this->db->where('level_' . $this->access_level, '1');
        $query = $this->db->where('nav_display', '1');
        $query = $this->db->get('access_control');

        if ($query->num_rows() > 0) {
            $records = $query->result();
            $nav_links = array();
            foreach ($records as $record) {
                $link = $record->controller . "/" . $record->function;
                $title = $record->title;
                $nav_links[$link] = $title;
            }
            return $nav_links;
        } else {
            return false;
        }
    }

}

?>
