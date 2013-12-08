<?php

class User extends CI_Model {

    public $id;
    public $username;
    public $first_name;
    public $user_level;
    public $page_links;

    function __construct() {
        parent::__construct();
    }

    public function username() {
        return $this->username;
    }

    public function authenticate($username, $password) {
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $query = $this->db->get_where('users', $where, 1);
        if ($query->num_rows() == 1) {
            $user_data = $query->first_row('array');
            $this->id = $user_data['id'];
            $this->username = $user_data['username'];
            $this->user_level = $user_data['user_level'];
            $this->first_name = $user_data['first_name'];
            $session_data = array(
                'logged_in' => true,
                'username' => $this->username,
                'first_name' => $this->first_name,
                'user_level' => $this->user_level
            );
            $this->session->set_userdata($session_data);
            return true;
        } else {
            return false;
        }
    }

    function namebyid($id) {
        $where = array(
            'id' => $id,
        );
        $query = $this->db->get_where('users', $where, 1);
        if ($query->num_rows() == 1) {
            $result = $query->first_row();
            return $result->first_name ." " . $result->last_name;
        }
    }
}
?>
