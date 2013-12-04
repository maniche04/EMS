<?php

class User extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public static function findByUsername($username) {
        $sql = "SELECT * FROM `users` WHERE `username` = \"" . $username . "\"";
        $ci = get_instance();  //WHY IS THIS REQUIRED???
        $q = $ci->db->query($sql);
        if ($q->num_rows() > 0) {
            //User found
            $user = $q->row();
            return $user;
        }
        else
            return false;
    }

}

?>
