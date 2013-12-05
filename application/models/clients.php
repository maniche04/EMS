<?php

class Clients extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public static function findByShortName($shortname) {
        $sql = "SELECT * FROM `clients` WHERE `shortname` = \"" . $shortname . "\"";
        $ci = get_instance();  //WHY IS THIS REQUIRED???
        $q = $ci->db->query($sql);
        if ($q->num_rows() > 0) {
            //User found
            $client = $q->row();
            return $client;
        }
        else
            return false;
    }

}

?>
