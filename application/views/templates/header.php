<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "css/main.css" ?>">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Electrolize|Ubuntu">
        <script src="<?php echo base_url() . "js/jquery.js" ?>"></script>
        <script src="<?php echo base_url() . "js/newscript.js" ?>"></script>
        <title><?php echo $title ?></title>

    <div id="site_title">
        <img id="logo" src="<?php echo $this->config->item('logo_url') ?>">
        <div id="title_text"> <b><?php echo " | " . $this->config->item('site_name'); ?></b> </div> 
    </div>
    <div class="menubar">
        <div id="links">
            <?php
            if ($this->session->userdata('user_level') == 1) {
                $links = array(
                    'Home' => 'home',
                    'Assignments' => 'assignment',
                    'Clients' => 'client',
                    'Staffs' => 'staff',
                    'News' => 'news',
                    'Notices' => 'notice',
                    'Logs' => 'logs',
                    'About' => 'about'
                );
            } else {
                $links = array(
                    'Home' => 'home',
                    'Assignments' => 'assignment',
                    'Clients' => 'client',
                    'News' => 'news',
                    'Notices' => 'notice',
                    'About' => 'about'
                );
            }
            ?>

            <?php foreach ($links as $label => $link) : ?>
                <?php
                if ($this->uri->segment(1) == $link) {
                    echo anchor($link, $label, 'id="current_link"');
                } else {
                    echo anchor($link, $label);
                }
                ?>

            <?php endforeach; ?>


        </div>

        <div id="logout">
            <?php echo anchor('login/doLogout', 'Logout (' . $this->session->userdata('username') . ")"); ?>
        </div>
    </div>



</head>
