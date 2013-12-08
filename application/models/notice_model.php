<?php

class Notice_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getbyid($id) {
        $query = $this->db->where('id', $id);
        $query = $this->db->get('notice');
        if ($query->num_rows() == 1) {
            $notice = $query->first_row('array');
            if ($notice['type'] == 'firm') {
                return $notice;
            } elseif ($notice['type'] == 'client') {
                //authenticate to see if the user has access to the client
            } elseif ($notice['type'] == 'assignment') {
                //authenticate to see if the user has access to the assignment
            } else {
                redirect('notice/index');
            }
        } else {
            redirect('notice/index');
        }
    }

    public function getbytype($type) {
        $query = $this->db->where('type', $type);
        $query = $this->db->get('notice');
        if ($query->num_rows() > 0) {
            //Data found
            $records = $query->result();
            return $records;
        } else {
            return false;
        }
    }

}

?>
